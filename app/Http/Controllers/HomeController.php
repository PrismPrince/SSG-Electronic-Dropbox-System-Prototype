<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use App\Post;
use App\Survey;
use App\Suggestion;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function home()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $surveys = Survey::orderBy('created_at', 'desc')->get();
        $all = $posts->merge($surveys)->sortByDesc('created_at')->chunk(5)->all();

        $chunk = Input::get('page') !== null || Input::get('page') > 1 ? Input::get('page') - 1 : 0;

        $paginator = new LengthAwarePaginator($all[$chunk], count($all), 5);
        $paginator->setPath(request()->getPathInfo());

        return view('home')->withActivities($paginator);
    }

    public function profileTimeline($id)
    {
        $user = User::findOrFail($id);

        $posts = Post::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        $surveys = Survey::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        $all = $posts->merge($surveys)->sortByDesc('created_at')->chunk(5)->all();

        $chunk = Input::get('page') !== null || Input::get('page') > 1 ? Input::get('page') - 1 : 0;

        $paginator = new LengthAwarePaginator($all[$chunk], count($all), 5);
        $paginator->setPath(request()->getPathInfo());

        return view('users.profile_timeline')->withUser($user)->withActivities($paginator);
    }
}
