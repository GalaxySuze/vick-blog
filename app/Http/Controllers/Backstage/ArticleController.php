<?php

namespace App\Http\Controllers\Backstage;

use App\Models\Article;
use App\Models\Category;
use App\Models\Label;
use App\Services\FormServices\ArticleFormService;
use App\Services\TableServices\ArticleTableService;
use App\Support\Helper;
use App\Support\MarkdownSupport;
use App\Support\ResponseSupport;
use App\Support\UploadSupport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class ArticleController extends Controller
{
    private $formEvent = 'articleForm';

    private $routeConf;

    public function __construct()
    {
        $this->routeConf = Helper::routeDefault('article');
    }

    public function list()
    {
        return view('backstage.list', [
            'tableName' => $this->tableServices . 'ArticleTableService',
            'searchBarName' => $this->searchServices . 'ArticleSearchService',
            'addRoute' => route($this->routeConf['add']),
            'dataRoute' => route($this->routeConf['data']),
            'formEvent' => $this->formEvent,
        ]);
    }

    public function listData(Request $request)
    {
        $articlesList = Article::getArticles($request->conditions);
        $this->handleDataDisplay($articlesList);
        return $this->successfulResponse(['successful', $articlesList, $articlesList->count()]);
    }

    public function handleDataDisplay(&$data)
    {
        $upload = new UploadSupport();
        $table = new ArticleFormService();
        $data->each(function ($item, $key) use ($upload, $table) {
            $item->editRoute = route($this->routeConf['edit'], $item->id);
            $item->delRoute = route($this->routeConf['del'], $item->id);
            $item->status = Article::$statusConf[$item->status];
            $item->label = implode(', ', $table->setArticleLabels(
                Label::getLabels(['id' => $item->label])
            ));
            $item->category = optional(Category::getCategories(['id' => $item->category]))->name;
            $item->is_original = $item->is_original ? '是' : '否';
            $item->page_image = !empty($item->page_image) ? $upload->setFileUrl($item->page_image, true) : null;
        });
    }

    public function delArticle($id)
    {
        return parent::del(Article::class, $id, route($this->routeConf['list']));
    }

    public function editor($id = null)
    {
        return view('backstage.editor', [
            'editRoute' => route($this->routeConf['edit']),
            'formName' => $this->formServices . 'ArticleFormService',
            'modelId' => $id,
            'formEvent' => $this->formEvent
        ]);
    }

    public function edit(Request $request, UploadSupport $uploadSupport, MarkdownSupport $markdownSupport)
    {
        try {
            $this->validate($request, $this->validateRules(), $this->validateMessages());
            $input = $request->all();
            $this->handleInput($input, $markdownSupport);
            $pageImg = $input['page_image'];
            $msg = '操作异常!';
            if (!empty($input['id'])) {
                $article = Article::find($input['id']);
                if ($article->update($input)) {
                    $msg = '更新成功!';
                    if (!empty($pageImg) && !$uploadSupport->existsFile(UploadSupport::UPLOAD_USED_DIR . $pageImg)) {
                        // 如果有上传img,但是在used目录没有,那就是新上传的
                        $uploadSupport->moveFile($pageImg);
                    }
                }
            } else {
                if (Article::create($input)) {
                    $msg = '新增成功!';
                    if (!empty($pageImg)) {
                        $uploadSupport->moveFile($pageImg);
                    }
                }
            }
            $request->session()->flash('msg', $msg);
            return $this->successfulResponse([$msg, route($this->routeConf['list'])]);
        } catch (\Throwable $e) {
            $getError = env('APP_DEBUG') ? $e->getMessage() : '当前操作发生错误!';
            return $this->failedResponse([$getError]);
        }
    }

    private function validateRules()
    {
        return [
            'title' => 'required|max:80',
            'desc' => 'required|max:255',
            'keyword' => 'required|max:255',
            'release_time' => 'nullable',
            'link' => 'nullable|max:255',
            'status' => 'required',
            'category' => 'required',
            'is_original' => 'nullable',
            'label' => 'required',
            'content' => 'nullable',
            'page_image' => 'nullable',
        ];
    }

    private function validateMessages()
    {
        return [
            'title.required' => '请输入「标题」.',
            'title.max' => '「标题」最大长度为80个字符.',
            'desc.required' => '请输入「描述」.',
            'desc.max' => '「描述」最大长度为255个字符.',
            'keyword.required' => '请输入「关键词」.',
            'keyword.max' => '「关键词」最大长度为255个字符.',
            'link.max' => '「链接」最大长度为255个字符.',
            'label.required' => '请最少选择一个「标签」.',
        ];
    }

    private function handleInput(&$input, ...$support)
    {
        list($mdSupport) = $support;
        $input['original_content'] = $input['content'];
        $input['content'] = $mdSupport->parse($input['content']);
        $input['label'] = array_keys($input['label']);
        $input['user_id'] = 1; //TODO: 用户登录的id
        $input['is_original'] = empty($input['is_original']) ? 0 : 1;
    }

    public function uploadImage(Request $request, UploadSupport $uploadSupport)
    {
        try {
            $file = $request->file('file');
            if ($file->isValid()) {
                $uploadRel = $uploadSupport->uploadFile($file);
                return $this->successfulResponse(['上传封面成功!', $uploadRel]);
            }
        } catch (\Throwable $e) {
            $getError = env('APP_DEBUG') ? $e->getMessage() : '上传封面发生错误!';
            return $this->failedResponse([$getError]);
        }
    }

    public function delUploadImage(Request $request, UploadSupport $uploadSupport)
    {
        try {
            $file = $request->img;
            if (!empty($request->id)) {
                $article = Article::find($request->id);
                $article->page_image = null;
                if ($article->save()) {
                    $uploadSupport->delAllFile($file);
                }
            } else {
                $uploadSupport->delAllFile($file);
            }
            return $this->successfulResponse(['删除图片成功!']); //<删除图片成功!> 字符与前端ajax处理绑定
        } catch (\Throwable $e) {
            $getError = env('APP_DEBUG') ? $e->getMessage() : '删除图片发生错误!';
            return $this->failedResponse([$getError]);
        }
    }
}
