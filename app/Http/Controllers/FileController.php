<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Http\Response;
use Intervention\Image\ImageManagerStatic as Image;

class FileController extends Controller
{
    public function getImage($folder, $id)
    {
        return Image::make(storage_path() . '\app\public\images\\' . $folder . '\\' . $id . '.jpg')->response();
    }

    public function postImage(Request $request, $folder, $id)
    {
        switch ($folder) {
            case 'posts':
            case 'surveys':
                $img = Image::make($request->file('image')->getRealPath());
                $img->save(storage_path() . '\app\public\images\\' . $folder . '\\' . $id . '.jpg');
                return true;
            case 'cover':
            case 'avatar':
                $x = floor($request->x);
                $y = floor($request->y);
                $w = floor($request->w);
                $h = floor($request->h);
                $img = Image::make($request->file('image')->getRealPath());
                $img->crop($w, $h, $x, $y);
                $img->save(storage_path() . '\app\public\images\\' . $folder . '\\' . $id . '.jpg');
                return back();
            default:
                return false;
        }
    }
}
