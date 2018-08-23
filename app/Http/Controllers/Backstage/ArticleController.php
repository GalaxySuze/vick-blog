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
    const OUTLINE_TAGS = 'h4';

    /**
     * @var string
     */
    private $formEvent = 'articleForm';
    /**
     * @var array
     */
    private $routeConf;

    /**
     * ArticleController constructor.
     */
    public function __construct()
    {
        $this->routeConf = Helper::routeDefault('article');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list()
    {
        return view('backstage.list', [
            'tableName' => $this->tableServices . 'ArticleTableService',
            'searchBarName' => $this->searchServices . 'ArticleSearchService',
            'addRoute' => route($this->routeConf['addPage']),
            'dataRoute' => route($this->routeConf['data']),
            'formEvent' => $this->formEvent,
        ]);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function listData(Request $request)
    {
        $articlesList = Article::getModelData(
            $request->conditions, $request->page, $request->limit
        );
        $this->handleDataDisplay($articlesList);
        return $this->successfulResponse(['successful', $articlesList, Article::count()]);
    }

    /**
     * @param $data
     */
    public function handleDataDisplay(&$data)
    {
        $upload = new UploadSupport();
        $table = new ArticleFormService();
        $data->each(function ($item, $key) use ($upload, $table) {
            $item->editRoute = route($this->routeConf['editPage'], $item->id);
            $item->delRoute = route($this->routeConf['del'], $item->id);
            $item->status = Article::$statusConf[$item->status];
            $item->label = implode(', ', $table->setArticleLabels(
                Label::getModelData(['id' => $item->label['labels']])
            ));
            $item->category = optional(Category::find($item->category))->name;
            $item->is_original = $item->is_original ? '是' : '否';
            $item->page_image = !empty($item->page_image) ? $upload->setFileUrl($item->page_image, true) : null;
        });
    }

    /**
     * @param $id
     * @return array
     */
    public function delArticle($id)
    {
        return parent::del(Article::class, $id, route($this->routeConf['list']));
    }

    /**
     * @param null $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editor($id = null)
    {
        return view('backstage.editor', [
            'editRoute' => route($this->routeConf['edit']),
            'listRoute' => route($this->routeConf['list']),
            'formName' => $this->formServices . 'ArticleFormService',
            'modelId' => $id,
            'formEvent' => $this->formEvent
        ]);
    }

    /**
     * @param Request $request
     * @param UploadSupport $uploadSupport
     * @param MarkdownSupport $markdownSupport
     * @return array
     */
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

    /**
     * @return array
     */
    private function validateRules()
    {
        return [
            'title' => 'required|max:80',
            'desc' => 'required|max:255',
            'keyword' => 'required|max:255',
            'release_time' => 'required',
            'link' => 'nullable|max:255',
            'status' => 'required',
            'category' => 'required',
            'is_original' => 'nullable',
            'label' => 'required',
            'content' => 'nullable',
            'page_image' => 'nullable',
        ];
    }

    /**
     * @return array
     */
    private function validateMessages()
    {
        return [
            'title.required' => '请输入「标题」.',
            'title.max' => '「标题」最大长度为80个字符.',
            'desc.required' => '请输入「描述」.',
            'desc.max' => '「描述」最大长度为255个字符.',
            'keyword.required' => '请输入「关键词」.',
            'keyword.max' => '「关键词」最大长度为255个字符.',
            'release_time.required' => '请输入「发布时间」.',
            'link.max' => '「链接」最大长度为255个字符.',
            'label.required' => '请最少选择一个「标签」.',
        ];
    }

    /**
     * @param $input
     * @param array ...$support
     */
    private function handleInput(&$input, ...$support)
    {
        list($mdSupport) = $support;
        $input['original_content'] = $input['content'];
        list($input['outline'], $input['content']) = $this->generatedOutline(
            $mdSupport->parse($input['content'])
        );
        $input['label'] = ['labels' => array_keys($input['label'])];
        $input['user_id'] = 1; //TODO: 用户登录的id
        $input['is_original'] = empty($input['is_original']) ? 0 : 1;
    }

    /**
     * @param string $content
     * @param string $htmlTags
     * @return array
     */
    public function generatedOutline(string $content, string $htmlTags = self::OUTLINE_TAGS)
    {
        // 获取所有的标题数
        $titleNumber = substr_count($content, "<$htmlTags>");
        $titleReplace = $titleIdList = [];
        // 循环标题数
        for ($i = 0; $i < $titleNumber; $i++) {
            $titleId = 'outline_' . str_random(5);  // 生成唯一标题id
            $titleReplace[$i] = "<$htmlTags id='$titleId'>"; // 放入替换id数组
            $titleIdList[$i]['titleId'] = $titleId; // 放入数据库保存值
        }
        // 增加文章标题id
        $replaceContent = $replaceTmp = str_replace_array("<$htmlTags>", $titleReplace, $content);
        foreach ($titleIdList as $k => $titleItem) {
            $cutTitle = str_after($replaceTmp, $titleReplace[$k]);  // 截取到唯一id开始字符
            $hTitle = mb_substr($cutTitle, 0, mb_strpos($cutTitle, "</$htmlTags>"));   //截取标题值
            $titleIdList[$k]['outlineTitle'] = $hTitle;
        }
        return [$titleIdList, $replaceContent];
    }

    /**
     * @param Request $request
     * @param UploadSupport $uploadSupport
     * @return array
     */
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

    /**
     * @param Request $request
     * @param UploadSupport $uploadSupport
     * @return array
     */
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
