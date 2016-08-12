<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Survey;
use Illuminate\Http\Response;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;

class AjaxController extends Controller
{
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
                $post = Post::findOrFail($id);
                $head = view('ajax.activity_head')->withActivity($post)->render();
                $body = view('ajax.activity_body')->withActivity($post)->render();
                return response()->json(['head' => $head, 'body' => $body]);
                break;
            default:
                # code...
                break;
        }
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
    			return view('');
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
