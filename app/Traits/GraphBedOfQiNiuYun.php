<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/9/24
 * Time: 23:13
 */

namespace App\Traits;


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
     * @param $loaclImgInfo
     * @return array
     * @throws \Exception
     */
    public function uploadGraphBed($loaclImgInfo)
    {
        $this->setGraphBedConfig();
        $auth = $this->auth();
        $bucket = $this->bucket;
        $token = $auth->uploadToken($bucket);
        $key = $loaclImgInfo['imgName'];
        $localPath = $loaclImgInfo['localPath'];
        $uploadMgr = new UploadManager();
        list($result, $err) = $uploadMgr->putFile($token, $key, $localPath);
        if (empty($err)) {
            return [
                'result' => $result,
                'path' => $result,
                'status' => 1,
            ];
        } else {
            return [
                'msg' => $err,
                'status' => 2,
            ];
        }
    }

    /**
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
     * @return Auth
     */
    public function auth()
    {
        return new Auth($this->accessKey,$this->secretKey);
    }

    public function setGraphBedConfig()
    {
        $this->accessKey = env('GRAPH_BED_ACCESS_KEY');
        $this->secretKey = env('GRAPH_BED_SECRET_KEY');
        $this->bucket = env('GRAPH_BED_BUCKET');
        $this->boundDomain = env('GRAPH_BED_BOUND_DOMAIN');
    }
}