<?php

namespace App;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class Outils
{
    public static function image($request) {
        $name = $request->getClientOriginalName();
        Image::make($request)->resize(env('IMG_WIDTH'), env('IMG_HEIGHT'))->save($name);
        $data = base64_encode(file_get_contents($name));

        File::delete($name);

        return $data;
    }

    public static function generatecode()
    {
        return substr(str_shuffle(env('CODE_POOL')), 0, env('CODE_LENGTH'));
    }

    public static function formatdate()
    {
        return "Y-m-d H:i:s";
    }

}