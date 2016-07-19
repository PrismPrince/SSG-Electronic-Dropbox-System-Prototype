<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest', ['only' => 'index']);
        $this->middleware('auth', ['only' => ['admin', 'moderator']]);
        $this->middleware('admin', ['only' => ['admin']]);
        $this->middleware('moderator', ['only' => ['moderator']]);
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

    public function admin()
    {
        return view('admin');
    }

    public function moderator()
    {
        return view('moderator');
    }
}
