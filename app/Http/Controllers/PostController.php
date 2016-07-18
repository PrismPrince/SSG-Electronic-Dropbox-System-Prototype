<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Post;
use Validator;
use App\Http\Requests;
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
        $posts = Post::orderBy('updated_at', 'desc')->paginate(10);
        return view('posts.index')->withPosts($posts);
    }

    public function me()
    {
        $posts = Post::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(10);
        //dd($posts);
        return view('posts.index')->withPosts($posts);
    }

    public function other()
    {
        $posts = Post::where('user_id','!=', Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(10);
        //dd($posts);
        return view('posts.index')->withPosts($posts);
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
            'desc' => 'required',//|regex:/^[\r\n\s\_\-\:\.\,\?\\\\\/\'\"\%\&\#\@\!\(\)0-9A-zÑñ]{1,255}$/',
            // unique:'table','field','except(the user's id)','PK'
        ];

        $messages = [
            'title.required' => 'Please enter the title!',
            'title.regex' => 'Some characters are not accepted!',
            'title.max' => 'Maximum of 255 characters only!',
            'desc.required' => 'Please enter the description!',
            'desc.regex' => 'Some characters are not accepted!',
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
        $post = Post::findOrFail($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        if($post->user_id != Auth::user()->id) return redirect()->route('posts.show', $post->id);
        return view('posts.edit')->withPost($post);
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
            'desc' => 'required',//|regex:/^[\r\n\s\_\-\:\.\,\?\\\\\/\'\"\%\&\#\@\!\(\)0-9A-zÑñ]{1,255}$/',
            // unique:'table','field','except(the user's id)','PK'
        ];

        $messages = [
            'title.required' => 'Please enter the title!',
            'title.regex' => 'Some characters are not accepted!',
            'title.max' => 'Maximum of 255 characters only!',
            'desc.required' => 'Please enter the description!',
            'desc.regex' => 'Some characters are not accepted!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) return redirect('posts/create')->withErrors($validator)->withInput();
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
}
