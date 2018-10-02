<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/10/1
 * Time: 16:09
 */

namespace App\Traits;


use App\Models\Article;
use App\Support\UploadSupport;
use Illuminate\Http\Request;

trait ArticleIMGOperation
{
    /**
     * 图片上传
     * @param Request $request
     * @param UploadSupport $uploadSupport
     * @return mixed
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
     * 上传图片删除
     * @param Request $request
     * @param UploadSupport $uploadSupport
     * @return mixed
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

    /**
     * @param $input
     * @param $uploadSupport
     */
    public function updateUpload($input, $uploadSupport)
    {
        $pageImg = $input['page_image'];
        if (!empty($pageImg) && !$uploadSupport->existsFile(UploadSupport::UPLOAD_USED_DIR . $pageImg)) {
            //如果有上传img,但是在used目录没有,那就是新上传的
            $uploadSupport->moveFile($pageImg);
        }
    }
}