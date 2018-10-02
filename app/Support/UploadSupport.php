<?php
/**
 * Created by PhpStorm.
 * User: vick
 * Date: 2018/6/20
 * Time: 18:32
 */

namespace App\Support;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class UploadSupport
{
    const UPLOAD_TMP_DIR = 'tmp/';
    const UPLOAD_USED_DIR = 'used/';
    /**
     * @var array
     */
    public static $uploadDirs = [
        self::UPLOAD_TMP_DIR,
        self::UPLOAD_USED_DIR,
    ];
    /**
     * @var string
     */
    public $uploadDrive = 'upload';

    /**
     * @param $file
     * @return array
     */
    public function uploadFile($file)
    {
        $ext = $file->getClientOriginalExtension();  // 获得后缀名
        $path = $file->getRealPath();    // 获得临时路径
        $filename = $this->setUploadFileName($ext); // 设置图片名
        $fileDir = Carbon::today()->toDateString(); // 设置保存目录
        $fileSaved = $fileDir . '/' . $filename;  // 设置保存值
        Storage::disk($this->uploadDrive)->put(self::UPLOAD_TMP_DIR . $fileSaved, file_get_contents($path));
        return [
            'imgUrl' => $this->setFileUrl($fileSaved),
            'imgName' => $fileSaved
        ];
    }

    /**
     * @param $ext
     * @return string
     */
    public function setUploadFileName($ext)
    {
        return Carbon::now()->timestamp . '_' . uniqid() . '.' . $ext;
    }

    /**
     * @param $file
     * @param bool $isUsed
     * @return mixed
     */
    public function setFileUrl($file, $isUsed = false)
    {
        $dir = $isUsed ? self::UPLOAD_USED_DIR : self::UPLOAD_TMP_DIR;
        return app('url')->asset('storage/' . $dir . $file);
    }

    /**
     * @param $file
     * @throws \Throwable
     */
    public function delAllFile($file)
    {
        foreach (self::$uploadDirs as $dir) {
            if ($this->existsFile($dir . $file)) {
                $this->delFile($dir . $file);
            }
        }
    }

    /**
     * @param $file
     * @return bool
     */
    public function existsFile($file)
    {
        return Storage::disk($this->uploadDrive)->exists($file);
    }

    /**
     * @param $file
     * @throws \Throwable
     */
    public function delFile($file)
    {
        throw_if(!$this->existsFile($file), \Throwable::class, '删除文件不存在!');
        Storage::disk($this->uploadDrive)->delete($file);
    }

    /**
     * @param $file
     * @param string $from
     * @param string $to
     * @return bool
     */
    public function moveFile($file, $from = self::UPLOAD_TMP_DIR, $to = self::UPLOAD_USED_DIR)
    {
        return Storage::disk($this->uploadDrive)->move($from . $file, $to . $file);
    }

    /**
     * @param $fileInfo
     * @param string $dirSymbol
     * @return mixed
     */
    public function getFileName($fileInfo, $dirSymbol = '/')
    {
        $file = explode($dirSymbol, $fileInfo);
        return end($file);
    }

}