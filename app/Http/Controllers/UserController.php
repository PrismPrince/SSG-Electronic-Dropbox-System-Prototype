<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Hash;
use Session;
use App\User;
use App\Post;
use Validator;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carbon = new Carbon;
        $users = User::orderBy('updated_at', 'desc')->paginate(15);
        $count = $this->countUsers();
        return view('users.index')->withUsers($users)->withCount($count)->withCarbon($carbon);
    }

    public function moderator()
    {
        $carbon = new Carbon;
        $users = User::where('role', 'moderator')->orderBy('updated_at', 'desc')->paginate(15);
        $count = $this->countUsers();
        return view('users.index')->withUsers($users)->withCount($count)->withCarbon($carbon);
    }

    public function admin()
    {
        $carbon = new Carbon;
        $users = User::where('role', 'admin')->orderBy('updated_at', 'desc')->paginate(15);
        $count = $this->countUsers();
        return view('users.index')->withUsers($users)->withCount($count)->withCarbon($carbon);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'fname' => 'required|regex:/[\s\-\.A-zÑñ]{1,255}/|max:255',
            'mname' => 'regex:/[\s\-\.A-zÑñ]{1,255}/|max:255',
            'lname' => 'required|regex:/[\s\-\.A-zÑñ]{1,255}/|max:255',
            'username' => 'required|regex:/[\s\_\-\.A-zÑñ]{1,255}/|unique:users,username|min:6|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'role' => 'required',
            'password' => 'required|min:6',
            'password_confirm' => 'required|same:password',
        ];

        $messages = [
            'fname.required' => 'Please enter a valid name!',
            'fname.regex' => 'Please enter a valid username! Valid symbols: ".","-"',
            'fname.max' => 'Maximum of 255 characters only!',
            'mname.regex' => 'Please enter a valid username! Valid symbols: ".","-"',
            'mname.max' => 'Maximum of 255 characters only!',
            'lname.required' => 'Please enter a valid name!',
            'lname.regex' => 'Please enter a valid username! Valid symbols: ".","-"',
            'lname.max' => 'Maximum of 255 characters only!',
            'username.required' => 'Please enter a valid name!',
            'username.regex' => 'Please enter a valid username! Valid symbols: "_", ".","-"',
            'username.unique' => 'Username is already registered! Try another one.',
            'username.max' => 'Maximum of 255 characters only!',
            'email.required' => 'Please enter the description!',
            'email.email' => 'Please enter a valid e-mail address!',
            'email.unique' => 'E-mail address is already registered! Try another one.',
            'email.max' => 'Maximum of 255 characters only!',
            'role' => 'Please select a role on the list!',
            'password.required' => 'Please enter a password!',
            'password.min' => 'Minimum of 8 characters!',
            'password_confirm.required' => 'Please confirm the password!',
            'password_confirm.same' => '',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) return redirect('users/create')->withErrors($validator)->withInput();
        else {
            $user = new User;
            $user->fname = ucwords(trim($request->fname));
            $user->mname = ucwords(trim($request->mname));
            $user->lname = ucwords(trim($request->lname));
            $user->username = trim($request->username);
            $user->email = trim($request->email);
            $user->role = $request->role;
            $user->password = Hash::make($request->password);
            $user->save();

            Session::flash('success', 'The new user was successfully added.');

            return redirect()->route('users.show', $user->id);
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
        $user = User::findOrFail($id);
        return view('users.show')->withUser($user)->withCarbon($carbon);
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
        $user = User::findOrFail($id);
        return view('users.edit')->withUser($user)->withCarbon($carbon);
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
            'fname' => 'required|regex:/[\s\-\.A-zÑñ]{1,255}/|max:255',
            'mname' => 'regex:/[\s\-\.A-zÑñ]{1,255}/|max:255',
            'lname' => 'required|regex:/[\s\-\.A-zÑñ]{1,255}/|max:255',
            'username' => 'required|regex:/[\s\_\-\.A-zÑñ]{1,255}/|unique:users,username,' . $id . '|min:6|max:255',
            'email' => 'required|email|unique:users,email,' . $id . '|max:255',
            'role' => 'required',
        ];

        $messages = [
            'fname.required' => 'Please enter a valid name!',
            'fname.regex' => 'Please enter a valid username! Valid symbols: ".","-"',
            'fname.max' => 'Maximum of 255 characters only!',
            'mname.regex' => 'Please enter a valid username! Valid symbols: ".","-"',
            'mname.max' => 'Maximum of 255 characters only!',
            'lname.required' => 'Please enter a valid name!',
            'lname.regex' => 'Please enter a valid username! Valid symbols: ".","-"',
            'lname.max' => 'Maximum of 255 characters only!',
            'username.required' => 'Please enter a valid name!',
            'username.regex' => 'Please enter a valid username! Valid symbols: "_", ".","-"',
            'username.unique' => 'Username is already registered! Try another one.',
            'username.max' => 'Maximum of 255 characters only!',
            'email.required' => 'Please enter the description!',
            'email.email' => 'Please enter a valid e-mail address!',
            'email.unique' => 'E-mail address is already registered! Try another one.',
            'email.max' => 'Maximum of 255 characters only!',
            'role' => 'Please select a role on the list!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) return redirect('users/' . $id . '/edit')->withErrors($validator)->withInput();
        else {
            $user = User::findOrFail($id);

            $user->fname = ucwords(trim($request->fname));
            $user->mname = ucwords(trim($request->mname));
            $user->lname = ucwords(trim($request->lname));
            $user->username = trim($request->username);
            $user->email = trim($request->email);
            $user->role = $request->role;
            $user->save();

            Session::flash('success', 'This user was successfully saved.');

            return redirect()->route('users.show', $user->id);
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
        $user = User::findOrFail($id);
        $posts = Post::where('user_id', $id)->delete();
        
        //if($user->user_id != Auth::user()->id) return redirect()->route('posts.show', $user->id);

        $name = $user->fname;
        $user->delete();

        Session::flash('success', "<b>$name</b> was successfully deleted.");

        return redirect()->route('users.index');
    }

    private function countUsers() {
        $count['all'] = User::all()->count();
        $count['admin'] = User::where('role', 'admin')->get()->count();
        $count['moderator'] = User::where('role', 'moderator')->get()->count();

        return $count;
    }
}
