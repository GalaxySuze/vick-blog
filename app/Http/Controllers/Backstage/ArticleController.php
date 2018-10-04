<?php

namespace App\Http\Controllers\Backstage;

use App\Models\Article;
use App\Models\Category;
use App\Models\Label;
use App\Services\FormServices\ArticleFormService;
use App\Support\MarkdownSupport;
use App\Traits\ArticleIMGOperation;
use App\Support\UploadSupport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    use ArticleIMGOperation;

    const OUTLINE_TAGS = 'h4';

    protected $master = 'article';
    protected $formEvent = 'articleForm';
    protected $tableName = 'ArticleTableService';
    protected $searchBarName = 'ArticleSearchService';
    protected $formName = 'ArticleFormService';
    protected $model = Article::class;

    /**
     * 处理数据显示
     * @param $data
     */
    public function handleDataDisplay(&$data)
    {
        if ($data) {
            $upload = $this->setSupport(UploadSupport::class);
            $table = $this->setSupport(ArticleFormService::class);
            $data->each(function ($item, $key) use ($upload, $table) {
                $item->editRoute = route($this->routeConf['editPage'], $item->id);
                $item->delRoute = route($this->routeConf['del'], $item->id);
                $item->status = Article::$statusConf[$item->status];
                $labelData = $table->setArticleLabels(
                    Label::getModelData(['id' => $item->label['labels']])
                );
                $item->label = implode(', ', $labelData);
                $item->category = optional(Category::find($item->category))->name;
                $item->is_original = $item->is_original ? '是' : '否';
                $pageImg = $item->page_image ?? null;
                if (Article::IMG_SAVE_LOCAL) {
                    $pageImg = $pageImg ? $upload->setFileUrl($item->page_image, true) : null;
                }
                $item->page_image = $pageImg;
                $item->allowEdit = true;
                $item->allowDel = true;
            });
        }
    }

    /**
     * 删除记录
     * @param $id
     * @return array
     */
    public function delArticle($id)
    {
        return parent::del($id, route($this->routeConf['list']));
    }

    /**
     * @param Request $request
     * @return array
     */
    public function edit(Request $request)
    {
        $this->validate($request, $this->verifyRules(), $this->verifyMessages());
        $input = $request->all();
        $pageImg = $input['page_image'];
        $uploadSupport = $this->setSupport(UploadSupport::class);
        $markdownSupport = $this->setSupport(MarkdownSupport::class);
        try {
            $this->handleInput($input, $markdownSupport);
            if (!empty($input['id'])) {
                $this->model::find($input['id'])->update($input);
                $msg = '更新成功!';
                if (Article::IMG_SAVE_LOCAL) {
                    $this->updateUpload($input, $uploadSupport);
                }
            } else {
                $input['user_id'] = Auth::id();
                $this->model::create($input);
                $msg = '新增成功!';
                if (Article::IMG_SAVE_LOCAL && !empty($pageImg)) {
                    $uploadSupport->moveFile($pageImg);
                }
            }
            $request->session()->flash('msg', $msg);
            return $this->successfulResponse([$msg, route($this->routeConf['list'])]);
        } catch (\Throwable $e) {
            return $this->failedResponse([$this->exceptionMsg($e)]);
        }
    }

    /**
     * @return array
     */
    public function verifyRules()
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
    public function verifyMessages()
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
     * 处理输入数据
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
        $input['is_original'] = empty($input['is_original']) ? 0 : 1;
    }

    /**
     * 生成文章目录
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
}
