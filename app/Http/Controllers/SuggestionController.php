<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Session;
use Validator;
use App\Student;
use Carbon\Carbon;
use App\Suggestion;

class SuggestionController extends Controller
{
    /*
    */
    public function __construct()
    {
        $this->middleware('guest', ['only' => ['create', 'store']]);
        $this->middleware('auth', ['only' => ['index', 'show', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carbon = new Carbon;
        $suggestions = Suggestion::orderBy('updated_at', 'desc')->paginate(15);
        return view('suggestions.index')->withSuggestions($suggestions)->withCarbon($carbon);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suggestions.create');
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
            'student_id' => 'required|digits:7|exists:students,id',
            'fname' => 'required|exists:students,fname,id,' . $request->student_id,
            'mname' => 'exists:students,mname,id,' . $request->student_id,
            'lname' => 'required|exists:students,lname,id,' . $request->student_id,
            'title' => 'required|regex:/[\s\_\-\:\.\,\?\\\\\/\'\"\%\&\#\@\!\(\)0-9A-zÑñ]{1,255}/|max:255',
            'addressed_to' => 'required|regex:/[\s\_\-\:\.\,\?\\\\\/\'\"\%\&\#\@\!\(\)0-9A-zÑñ]{1,255}/|max:255',
            'message' => 'required',
        ];

        $messages = [
            'student_id.required' => 'Please enter a valid ID!',
            'student_id.digits' => 'Input must be seven digits!',
            'student_id.exists' => 'ID number not found!',
            'fname.required' => 'Please enter a valid name!',
            'fname.exists' => 'Your first name was not found!',
            'mname.exists' => 'Your middle name was not found!',
            'lname.required' => 'Please enter a valid name!',
            'lname.exists' => 'Your last name was not found!',
            'title.required' => 'Please enter the title!',
            'title.regex' => 'Some characters are not accepted!',
            'title.max' => 'Maximum of 255 characters only!',
            'addressed_to.required' => 'Please enter the title!',
            'addressed_to.regex' => 'Some characters are not accepted!',
            'addressed_to.max' => 'Maximum of 255 characters only!',
            'message.required' => 'Please enter the messageription!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('suggest/create')->withErrors($validator)->withInput();
        }
        else {
        //return 'success';
            $suggestion = new Suggestion;
            $suggestion->student_id = trim($request->student_id);
            $suggestion->title = trim($request->title);
            $suggestion->addressed_to = trim($request->addressed_to);
            $suggestion->message = trim($request->message);
            $suggestion->save();

            Session::flash('success', 'Your suggestion was successfully send.');

            return redirect('/');
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

        $suggestion = Suggestion::findOrFail($id);
        return view('suggestions.show')->withSuggestion($suggestion)->withCarbon($carbon);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suggestion = Suggestion::findOrFail($id);

        $title = $suggestion->title;
        $student = $suggestion->student->fname;
        $suggestion->delete();

        Session::flash('success', "The suggestion <b>$title</b> by <b>$student</b> was successfully deleted.");

        return redirect()->route('suggestions.index');
    }
}
