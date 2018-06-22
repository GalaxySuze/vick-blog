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

    public static $uploadDirs = [
        self::UPLOAD_TMP_DIR,
        self::UPLOAD_USED_DIR,
    ];

    private $uploadDrive = 'upload';

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
        $fileSaved = $fileDir . '/' . $filename;  // 设置字段保存值
        Storage::disk($this->uploadDrive)->put(self::UPLOAD_TMP_DIR . $fileSaved, file_get_contents($path));
        return [
            'imgUrl' => app('url')->asset('storage/' . self::UPLOAD_TMP_DIR . $fileSaved),
            'imgName' => $fileSaved
        ];
    }

    /**
     * @param $ext
     * @return string
     */
    public function setUploadFileName($ext)
    {
        return Carbon::now()->toDateTimeString() . '_' . uniqid() . '.' . $ext;
    }

    /**
     * @param $file
     * @throws \Throwable
     */
    public function delFile($file)
    {
        throw_if(! $this->existsFile($file), \Throwable::class, '删除文件不存在!');
        Storage::disk($this->uploadDrive)->delete($file);
    }

    /**
     * @param $file
     */
    public function delAllFile($file)
    {
        foreach (self::$uploadDirs as $dir) {
            if (Storage::disk($this->uploadDrive)->exists($dir . $file)) {
                Storage::disk($this->uploadDrive)->delete($dir . $file);
            }
        }
    }

    /**
     * @param $file
     * @return bool
     */
    public function moveFile($file)
    {
        return Storage::disk($this->uploadDrive)->move(self::UPLOAD_TMP_DIR . $file, self::UPLOAD_USED_DIR . $file);
    }

    /**
     * @param $file
     * @return bool
     */
    public function existsFile($file)
    {
        return Storage::disk($this->uploadDrive)->exists($file);
    }

}