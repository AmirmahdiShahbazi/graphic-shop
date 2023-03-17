<?php

namespace App\Utilities;

use Illuminate\Support\Facades\File;

class ImageDeleter
{
    public static function delet(array $paths)
    {
        $thumbnailAndDemoUrl=$paths[0];
        $sourceUrl=$paths[1];
        if(File::deleteDirectory($thumbnailAndDemoUrl)&&File::deleteDirectory($sourceUrl))
        {
            return true;
        }
        return false;
    }
}