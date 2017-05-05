<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Session;
use App\Post;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class PostController extends Controller
{
    /*
    */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carbon = new Carbon;
        $posts = Post::orderBy('updated_at', 'desc')->paginate(15);
        $count = $this->countPosts();
        return view('posts.index')->withPosts($posts)->withCount($count)->withCarbon($carbon);
    }

    public function me()
    {
        $carbon = new Carbon;
        $posts = Post::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(15);
        $count = $this->countPosts();
        return view('posts.index')->withPosts($posts)->withCount($count)->withCarbon($carbon);
    }

    public function other()
    {
        $carbon = new Carbon;
        $posts = Post::where('user_id','!=', Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(15);
        $count = $this->countPosts();
        return view('posts.index')->withPosts($posts)->withCount($count)->withCarbon($carbon);
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
            'image' => 'image|max:20000',
        ];

        $messages = [
            'title.required' => 'Please enter the title!',
            'title.regex' => 'Some characters are not accepted!',
            'title.max' => 'Maximum of 255 characters only!',
            'desc.required' => 'Please enter the description!',
            'image.image' => 'File must be an image!',
            'image.max' => 'File too large!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        else {
            $post = new Post;
            $post->user_id = Auth::user()->id;
            $post->title = trim($request->title);
            $post->desc = trim($request->desc);
            $post->save();


            if($request->hasFile('image')) {
                $image = new FileController;
                
                if(!$image->postImage($request, 'posts', $post->id)) {
                    Session::flash('error', 'Error uploading photo!');
                    return back();
                }
            }

            return back();
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

    private function upload($request, $id) {

        $handle = new Upload($request->file('image')->getRealPath());
    
        if($handle->uploaded){
            echo 'yehey';
            $handle->file_overwrite = true;
            $handle->image_background_color = 'ffffff';
            $handle->file_new_name_body = $id;
            $handle->file_new_name_ext = 'x';
            
            $handle->Process(storage_path('app/public/images/posts'));
            
            if($handle->processed){
                $handle->Clean();
                return true;
            } else{
                $error = $handle->error;
                $handle->Clean();
                return dd($error);
            }
        } else return dd($handle->error);
        return true;
    }
}
