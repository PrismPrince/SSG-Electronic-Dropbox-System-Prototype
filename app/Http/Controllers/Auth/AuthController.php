<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'register', 'showRegistrationForm']]);
        $this->middleware('auth', ['only' => ['register', 'showRegistrationForm']]);
        $this->middleware('admin', ['only' => ['register', 'showRegistrationForm']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'fname' => 'required|regex:/^[a-zA-Z\s?\-?]{0,}$/|max:255',
            'mname' => 'regex:/^[a-zA-Z\s?\-?]{0,}$/|max:255',
            'lname' => 'required|regex:/^[a-zA-Z\s?\-?]{0,}$/|max:255',
            'username' => 'required|min:6|max:255|alpha_num|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirmpassword' => 'required|same:password',
        ];


        $messages = [
            'fname.required' => 'Please enter your first name.',
            'fname.regex' => 'First name must be alphabetic characters.',
            'fname.max' => 'More than 255 characers are not allowed.',
            'mname.regex' => 'Middle name must be alphabetic characters.',
            'mname.max' => 'More than 255 characers are not allowed.',
            'lname.required' => 'Please enter your last name.',
            'lname.regex' => 'Last name must be alphabetic characters.',
            'lname.max' => 'More than 255 characers are not allowed.',
            'username.required' => 'Please enter your username.',
            'username.min' => 'Username must have atleast 6 characters.',
            'username.alpha_num' => 'Username must be entirely alpha-numeric characters.',
            'username.unique' => 'Username is already taken.',
            'email.required' => 'Please enter your e-mail address.',
            'email.email' => 'Please enter a valid e-mail address.',
            'email.unique' => 'E-mail is already registered.',
            'password.required' => 'Please enter your password.',
            'password.min' => 'Password must have atleast 8 characters.',
            'confirmpassword.required' => 'Please confirm your password.',
            'confirmpassword.same' => 'Password does not match.',
        ];

        return Validator::make($data, $rules, $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'fname' => $data['fname'],
            'mname' => $data['mname'],
            'lname' => $data['lname'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
