<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;
use App\Post;
use App\Survey;
use Illuminate\Http\Response;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;

class AjaxController extends Controller
{
    public function __construct()
    {
        $surveys = Survey::all();
        $surveys->each(function ($item, $key)
        {
            if ($item->start > Carbon::now()) $item->status = 'pending';
            elseif ($item->start <= Carbon::now() && $item->end >= Carbon::now()) $item->status = 'active';
            elseif ($item->end < Carbon::now()) $item->status = 'expired';
            else $item->status = 'expired';
            $item->save();
        });
    }
    public function getShow($view)
    {
        switch ($view) {
            case 'activities':
                $this->showActivities();
                break;
            /*case 'post':
                $this->createPost();
                break;
            case 'survey':
                $this->createSurvey();
                break;

            case 'suggestion':
                $this->createSuggestion();
                break;*/
            default:
                return view('');
                break;
        }
    }

    private function showActivities()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $surveys = Survey::orderBy('created_at', 'desc')->get();
        $all = $posts->merge($surveys)->sortByDesc('created_at')->chunk(5)->all();

        $chunk = Input::get('page') !== null || Input::get('page') > 1 ? Input::get('page') - 1 : 0;

        $paginator = new LengthAwarePaginator($all[$chunk], count($all), 5);
        $paginator->setPath(request()->getPathInfo());

        echo view('ajax.activities')->withActivities($paginator)->render();
        return true;
    }

    public function getActivity($type, $id)
    {
        switch ($type) {
            case 'post':
                $info = Post::findOrFail($id);
                break;
            case 'survey':
                $info = Survey::findOrFail($id);
                break;
            case 'suggestion':
                $info = Suggestion::findOrFail($id);
                break;
            default:
                # code...
                break;
        }
        $head = view('ajax.activity_head')->withActivity($info)->render();
        $body = view('ajax.activity_body')->withActivity($info)->render();
        return response()->json(['head' => $head, 'body' => $body]);
    }

    public function getCreate($view)
    {
    	switch ($view) {
    		case 'post':
    			$this->createPost();
    			break;

    		case 'survey':
    			$this->createSurvey();
    			break;

    		case 'suggestion':
    			$this->createSuggestion();
    			break;
    		default:
    			return view('errors/404');
    			break;
    	}
    }

    private function createPost()
    {
        echo view('ajax.create_post')->render();
        return true;
    }

    private function createSurvey()
    {
        echo view('ajax.create_survey')->render();
        return true;
    }

    private function createSuggestion()
    {
        echo view('ajax.create_suggestion')->render();
        return true;
    }
}
