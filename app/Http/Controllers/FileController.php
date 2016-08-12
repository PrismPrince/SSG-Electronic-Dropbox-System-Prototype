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
        switch ($folder) {
            case 'posts':
                return $this->getPostImage($id);
                break;
            case 'surveys':
                return $this->getSurveyImage($id);
                break;
            case 'cover':
                return $this->getCoverImage($id);
                break;
            case 'avatar':
                return $this->getAvatarImage($id);
                break;
            default:
                return false;
                break;
        }
    }

    public function postImage(Request $request, $folder, $id)
    {
        switch ($folder) {
            case 'post':
                $this->savePostImage($request, $id);
                break;
            case 'survey':
                $this->saveSurveyImage($request, $id);
                break;
            case 'cover':
                $this->saveCoverImage($request, $id);
                return back();
            case 'avatar':
                $this->saveAvatarImage($request, $id);
                return back();
            default:
                return false;
        }
        return true;
    }

	private function savePostImage($request, $id)
	{
		$img = Image::make($request->file('image')->getRealPath());
        $img->save(storage_path() . '\app\public\images\posts\\' . $id . '.jpg');

        return true;
	}

	private function saveSurveyImage($request, $id)
	{
		$img = Image::make($request->file('image')->getRealPath());
        $img->save(storage_path() . '\app\public\images\surveys\\' . $id . '.jpg');

        return true;
	}

	private function saveCoverImage(Request $request, $id)
    {
        $x = floor($request->x);
        $y = floor($request->y);
        $w = floor($request->w);
        $h = floor($request->h);

    	$img = Image::make($request->file('image')->getRealPath());
        $img->crop($w, $h, $x, $y);
        $img->save(storage_path() . '\app\public\images\cover\\' . $id . '.jpg');

        return true;
    }

    private function saveAvatarImage(Request $request, $id)
    {
    	$x = floor($request->x);
        $y = floor($request->y);
        $w = floor($request->w);
        $h = floor($request->h);

        $img = Image::make($request->file('image')->getRealPath());
        $img->crop($w, $h, $x, $y);
        $img->save(storage_path() . '\app\public\images\avatar\\' . $id . '.jpg');

        return true;
    }

    private function getPostImage($id)
    {
    	return Image::make(storage_path() . '\app\public\images\posts\\' . $id . '.jpg')->response();
    }

    private function getSurveyImage($id)
    {
    	return Image::make(storage_path() . '\app\public\images\surveys\\' . $id . '.jpg')->response();
    }

    private function getCoverImage($id)
    {
    	return Image::make(storage_path() . '\app\public\images\cover\\' . $id . '.jpg')->response();
    }

    private function getAvatarImage($id)
    {
    	return Image::make(storage_path() . '\app\public\images\avatar\\' . $id . '.jpg')->response();
    }
}
