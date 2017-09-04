<?php
/**
 * Created by PhpStorm.
 * User: cedric
 * Date: 02/09/17
 * Time: 06:03
 */

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
}