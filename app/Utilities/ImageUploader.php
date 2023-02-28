<?php

namespace App\Utilities;



use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageUploader
{
    public static function upload($image, $path,$format='public_storage')
    {
        Storage::disk($format)->put($path,File::get($image));


    }

    public static function multipleUpload(array $images, $path, $format = 'public_storage')
    {
        $imagesPath=[];
        foreach ($images as $key => $image) {
            $fullPath=$path.$key.'_'.$image->getClientOriginalName();
            self::upload($image,$fullPath);
            $imagesPath+=[$key=>$fullPath];
        }
        return $imagesPath;
    }

}
