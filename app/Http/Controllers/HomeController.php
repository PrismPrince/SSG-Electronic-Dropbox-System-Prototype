<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use App\Post;
use App\Survey;
use Illuminate\Pagination\Paginator;
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
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        $surveys = Survey::orderBy('created_at', 'desc')->paginate(5);

        $total = $posts->total() + $surveys->total();
        $perPage = $posts->perPage() + $surveys->perPage();
        $items = array_merge($posts->items(), $surveys->items());
        $items = collect($items)->sortByDesc('created_at')->all();

        $paginator = new LengthAwarePaginator($items, $total, $perPage);
        $paginator->setPath(request()->getPathInfo());

        return view('home')->withActivities($paginator);
    }

    public function profileTimeline($id)
    {
        $user = User::findOrFail($id);

        $posts = Post::where('user_id', $id)->paginate(5);
        $surveys = Survey::where('user_id', $id)->paginate(5);

        $total = $posts->total() + $surveys->total();
        $perPage = $posts->perPage() + $surveys->perPage();
        $items = array_merge($posts->items(), $surveys->items());
        $items = collect($items)->sortByDesc('created_at')->all();

        $paginator = new LengthAwarePaginator($items, $total, $perPage);
        $paginator->setPath(request()->getPathInfo());

        return view('users.profile_timeline')->withUser($user)->withActivities($paginator);
    }
}
