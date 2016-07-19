<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Session;
use App\Post;
use Validator;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class PostController extends Controller
{
    /*
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carbon = new Carbon;
        $posts = Post::orderBy('updated_at', 'desc')->paginate(10);
        $count = $this->countPosts();
        return view('posts.index')->withPosts($posts)->withCount($count)->withCarbon($carbon);
    }

    public function me()
    {
        $carbon = new Carbon;
        $posts = Post::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(10);
        $count = $this->countPosts();
        return view('posts.index')->withPosts($posts)->withCount($count)->withCarbon($carbon);
    }

    public function other()
    {
        $carbon = new Carbon;
        $posts = Post::where('user_id','!=', Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(10);
        $count = $this->countPosts();
        return view('posts.index')->withPosts($posts)->withCount($count)->withCarbon($carbon);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|regex:/[\s\_\-\:\.\,\?\\\\\/\'\"\%\&\#\@\!\(\)0-9A-zÑñ]{1,255}/|max:255',
            'desc' => 'required',
        ];

        $messages = [
            'title.required' => 'Please enter the title!',
            'title.regex' => 'Some characters are not accepted!',
            'title.max' => 'Maximum of 255 characters only!',
            'desc.required' => 'Please enter the description!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) return redirect('posts/create')->withErrors($validator)->withInput();
        else {
            $post = new Post;
            $post->user_id = Auth::user()->id;
            $post->title = trim($request->title);
            $post->desc = trim($request->desc);
            $post->save();

            Session::flash('success', 'Your post was successfully posted.');

            return redirect()->route('posts.show', $post->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carbon = new Carbon;

        $post = Post::findOrFail($id);
        return view('posts.show')->withPost($post)->withCarbon($carbon);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carbon = new Carbon;
        $post = Post::findOrFail($id);
        if($post->user_id != Auth::user()->id) return redirect()->route('posts.show', $post->id);
        return view('posts.edit')->withPost($post)->withCarbon($carbon);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|regex:/[\s\_\-\:\.\,\?\\\\\/\'\"\%\&\#\@\!\(\)0-9A-zÑñ]{1,255}/|max:255',
            'desc' => 'required',
        ];

        $messages = [
            'title.required' => 'Please enter the title!',
            'title.regex' => 'Some characters are not accepted!',
            'title.max' => 'Maximum of 255 characters only!',
            'desc.required' => 'Please enter the description!',
            'desc.regex' => 'Some characters are not accepted!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) return redirect('posts/' . $id . '/edit')->withErrors($validator)->withInput();
        else {
            $post = Post::findOrFail($id);
            
            if($post->user_id != Auth::user()->id) return redirect()->route('posts.show', $post->id);

            $post->title = trim($request->title);
            $post->desc = trim($request->desc);
            $post->save();

            Session::flash('success', 'This post was successfully saved.');

            return redirect()->route('posts.show', $post->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        
        if($post->user_id != Auth::user()->id) return redirect()->route('posts.show', $post->id);

        $title = $post->title;
        $post->delete();

        Session::flash('success', "The post <b>$title</b> was successfully deleted.");

        return redirect()->route('posts.index');
    }

    public function getUserPosts()
    {
        $posts = Post::where('user_id', Auth::user()->id)->get();
        return view('posts.index')->withPosts($posts);
    }

    private function countPosts() {
        $count['all'] = Post::all()->count();
        $count['me'] = Post::where('user_id', Auth::user()->id)->get()->count();
        $count['other'] = Post::where('user_id','!=', Auth::user()->id)->get()->count();

        return $count;
    }
}
