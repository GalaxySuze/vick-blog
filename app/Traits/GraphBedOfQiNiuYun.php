<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/9/24
 * Time: 23:13
 */

namespace App\Traits;


use App\Models\Article;
use App\Support\UploadSupport;
use Illuminate\Support\Facades\Storage;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

/**
 * 基于七牛云的图床类
 * Trait GraphBedOfQiNiuYun
 * @package App\Traits
 */
trait GraphBedOfQiNiuYun
{
    protected $accessKey;  //公钥
    protected $secretKey;  //私钥
    protected $bucket;  //存储对象名称
    protected $boundDomain;  //绑定域名

    /**
     * 上传七牛云
     * @param $localImgInfo
     * @return array
     * @throws \Exception
     */
    public function uploadGraphBed($localImgInfo)
    {
        $this->setGraphBedConfig();
        $auth = $this->auth();
        $bucket = $this->bucket;
        $token = $auth->uploadToken($bucket);
        $key = $localImgInfo['imgName'];
        $localPath = $localImgInfo['localPath'];
        $uploadMgr = new UploadManager();
        list($result, $err) = $uploadMgr->putFile($token, $key, $localPath);
        if (empty($err)) {
            return [
                'result' => $result,
                'status' => 1,
            ];
        } else {
            return [
                'err' => $err,
                'status' => 2,
            ];
        }
    }

    /**
     * 获取图片外链
     * @param $key
     * @return string
     */
    public function getImgExternalLink($key)
    {
        $this->setGraphBedConfig();
        $auth = $this->auth();
        $baseUrl = $this->boundDomain.'/'. $key;
        return $auth->privateDownloadUrl($baseUrl);
    }

    /**
     * 七牛云验证
     * @return Auth
     */
    public function auth()
    {
        return new Auth($this->accessKey,$this->secretKey);
    }

    /**
     * 七牛云配置
     */
    public function setGraphBedConfig()
    {
        $this->accessKey = env('GRAPH_BED_ACCESS_KEY');
        $this->secretKey = env('GRAPH_BED_SECRET_KEY');
        $this->bucket = env('GRAPH_BED_BUCKET');
        $this->boundDomain = env('GRAPH_BED_BOUND_DOMAIN');
    }

    /**
     * @param $input
     * @param $uploadSupport
     * @throws \Exception
     */
    public function articleGraphBedOperation($input, $uploadSupport)
    {
        //本地上传后在上传图床
        $pageImg = $input['page_image'];
        $localFile = Storage::disk($uploadSupport->uploadDrive)->path(UploadSupport::UPLOAD_USED_DIR . $pageImg);
        $localFileInfo = [
            'imgName' => $uploadSupport->getFileName($pageImg),
            'localPath' => $localFile,
        ];
        $graphBedResult = $this->uploadGraphBed($localFileInfo);
        if ($graphBedResult['status']) {
            $graphBedLink = $this->getImgExternalLink($uploadSupport->getFileName($pageImg));
            $uploadSupport->delFile(UploadSupport::UPLOAD_USED_DIR . $pageImg);
            $update = ['page_image' => $graphBedLink];
        } else {
            $graphBedErrInfo = ['error' => $graphBedResult['err']];
            $update = ['page_image' => $graphBedErrInfo];
        }
        Article::find($input['id'])->update($update);
    }
}