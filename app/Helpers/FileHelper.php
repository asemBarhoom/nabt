<?php

namespace App\Helpers;

use FFMpeg\FFProbe;
use Carbon\CarbonInterval;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class FileHelper
{

    /**
     * @param mixed $data
     * @param mixed $path
     *
     * @return Array
     */
    public static function uploadFiles($data, $path)
    {
        $storedFiles = [];
        if (is_array($data)) {
            foreach ($data as $image) {
                $storedFiles[] = $image->store($path);
            }
        }
        return $storedFiles;
    }

    /**
     * @param mixed $data
     * @param mixed $path
     *
     * @return string $storedFile
     */
    public static function uploadFile($data, $path)
    {
        $storedFile = $data->store($path);
        return $storedFile;
    }

    /**
     * @param mixed $data
     *
     * @return void
     */
    public static function deleteFiles($data)
    {
        if (is_array($data)) {
            foreach ($data as $value) {
                Storage::delete($value ?? '');
            }
        }
    }

    /**
     * @param mixed $file
     *
     * @return integer $bytes
     */
    public static function getSize($file)
    {
        return Storage::size($file);
    }

    /**
     * @param mixed $files
     *
     * @return string $link
     */
    public static function getFullPath($files)
    {

        $links = [];
        if (is_array($files)) {
            foreach ($files as $file) {
                $links[] = url("storage/".$file);
            }
        }
        return $links;
    }

    public static function getFullPathSingleAsset($file)
    {
        return Storage::exists('public/'.$file)
            ? url('storage/' . $file)
            : url('avatar.png');
    }


    public static function getFullPathSingleDefaultAsset($file)
    {
        return url($file);
    }

    /**
     * @param mixed $files
     *
     * @return string $link
     */
    public static function getServerPath($files)
    {
        $links = [];
        if (is_array($files)) {
            foreach ($files as $file) {
                $links[] = storage_path('app/public/' . $file);
            }
        }
        return $links;
    }

    /**
     * @param mixed $oldFiles
     * @param array $newFiles
     * @param array $deletedFiles
     * @param mixed $path
     *
     * @return array $updatedFiles
     */
    public static function updateFiles($oldFiles = [], $newFiles = [], $deletedFiles = [], $path = "uploads")
    {
        $deletedFiles = collect($deletedFiles)->map(function ($item) {
            return str_replace(url('storage') . '/', "", $item);
        }
        )->toArray();

        $updatedFiles = array_diff($oldFiles, $deletedFiles);
        $uploadedFiles = static::uploadFiles($newFiles, $path);
        $updatedFiles = array_merge($updatedFiles, $uploadedFiles);
        static::deleteFiles($deletedFiles);
        return $updatedFiles;
    }

    /**
     * @param $oldFile
     * @param $newFile
     * @param $path
     * @return mixed|string
     */
    public static function updateFile($oldFile, $newFile, $path)
    {
        if ($newFile == null) {
            return $oldFile;
        }

        if ($oldFile !== null && Storage::exists($oldFile)) {

            Storage::delete($oldFile);
        }
        $updatedFile = static::uploadFile($newFile, $path);
        return $updatedFile;
    }

    /**
     * @param mixed $file
     *
     * @return string $time
     */
    public static function getDuration($file)
    {
        if (in_array(pathinfo($file, PATHINFO_EXTENSION), explode(',', Constant::VIDEO_MIMETYPES))) {

            $ffprobe = FFProbe::create(Config::get('app.ffmpeg'));

            $duration = $ffprobe->format(self::getServerPath([$file])[0])->get('duration');

            return CarbonInterval::seconds($duration)->format(Constant::PERIOD_FORMAT);
        }
        return null;
    }


}
