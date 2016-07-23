<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Auth;
use Session;
use App\User;
use Validator;
use App\Option;
use App\Survey;
use App\Student;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class SurveyController extends Controller
{
    /*
    */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carbon = new Carbon;


        $surveys = Survey::orderBy('updated_at', 'desc')->paginate(15);

        $votes = [];

        foreach ($surveys as $survey) {
            $totalVotes = 0;
            $options = Option::where('survey_id', $survey->id)->get();
            foreach ($options as $option) $totalVotes += count($option->students);
            $votes[$survey->id] = $totalVotes;
        }

        $count = $this->countSurveys();

        return view('surveys.index')->withSurveys($surveys)->withVotes($votes)->withCount($count)->withCarbon($carbon);
    }

    public function active()
    {
        $carbon = new Carbon;

        $surveys = Survey::where('status', 'active')->orderBy('updated_at', 'desc')->paginate(15);

        $votes = [];

        foreach ($surveys as $survey) {
            $totalVotes = 0;
            $options = Option::where('survey_id', $survey->id)->get();
            foreach ($options as $option) $totalVotes += count($option->students);
            $votes[$survey->id] = $totalVotes;
        }

        $count = $this->countSurveys();

        return view('surveys.index')->withSurveys($surveys)->withVotes($votes)->withCount($count)->withCarbon($carbon);
    }

    public function inactive()
    {
        $carbon = new Carbon;


        $surveys = Survey::where('status', 'inactive')->orderBy('updated_at', 'desc')->paginate(15);

        $votes = [];

        foreach ($surveys as $survey) {
            $totalVotes = 0;
            $options = Option::where('survey_id', $survey->id)->get();
            foreach ($options as $option) $totalVotes += count($option->students);
            $votes[$survey->id] = $totalVotes;
        }

        $count = $this->countSurveys();

        return view('surveys.index')->withSurveys($surveys)->withVotes($votes)->withCount($count)->withCarbon($carbon);
    }

    public function expired()
    {
        $carbon = new Carbon;


        $surveys = Survey::where('status', 'expired')->orderBy('updated_at', 'desc')->paginate(15);

        $votes = [];

        foreach ($surveys as $survey) {
            $totalVotes = 0;
            $options = Option::where('survey_id', $survey->id)->get();
            foreach ($options as $option) $totalVotes += count($option->students);
            $votes[$survey->id] = $totalVotes;
        }

        $count = $this->countSurveys();

        return view('surveys.index')->withSurveys($surveys)->withVotes($votes)->withCount($count)->withCarbon($carbon);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('surveys.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $survey = new Survey;
        $survey->user_id = Auth::user()->id;
        $survey->title = trim($request->title);
        $survey->desc = trim($request->desc);
        $survey->start = trim($request->start);
        $survey->end = trim($request->end);
        $survey->status = trim($request->status);
        $survey->type = trim($request->type);
        $survey->save();

        foreach ($request->answers as $answer) {
            $option = new Option;
            $option->survey_id = $survey->id;
            $option->answer = $answer;
            $option->save();
        }

        Session::flash('success', 'Your survey was successfully created.');

        return redirect()->route('surveys.show', $survey->id);
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

        $totalVotes = 0;

        $survey = Survey::findOrFail($id);
        $options = Option::where('survey_id', $id)->get();
        foreach ($options as $option) $totalVotes += count($option->students);
        foreach ($options as $option) {
            if($totalVotes == 0) $votes[$option->id] = 0;
            else {
                $votes[$option->id] = (count($option->students) / $totalVotes) * 100;
            }
        }

        return view('surveys.show')->withSurvey($survey)->withVotes($votes)->withCarbon($carbon);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function countSurveys() {
        $count['all'] = Survey::all()->count();
        $count['active'] = Survey::where('status', 'active')->get()->count();
        $count['inactive'] = Survey::where('status', 'inactive')->get()->count();
        $count['expired'] = Survey::where('status', 'expired')->get()->count();

        return $count;
    }

    public function vote(Request $request, $id)
    {
        if ($request->options == null) {
            $errors['options[]'] = 'Choose an option!';
            return redirect('surveys/' . $id)->withInput()->withErrors($errors);
        }

        $rules = [
            'student_id' => 'required|digits:7|exists:students,id',
            'fname' => 'required|exists:students,fname,id,' . $request->student_id,
            'lname' => 'required|exists:students,lname,id,' . $request->student_id,
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
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) return redirect('surveys/' . $id)->withErrors($validator)->withInput();
        else {
            
            $survey = Survey::find($id);
            $options = Option::where('survey_id', $survey->id)->get();

            foreach ($options as $option) {
                foreach ($option->students as $student) {
                    if ($student->id == $request->student_id) {
                        Session::flash('error', 'You can only vote <b>ONCE</b>!');
                        return redirect('surveys/' . $id);
                    }
                }
            }

            foreach ($request->options as $option) {
                DB::table('option_student')->insert([
                    'student_id' => $request->student_id,
                    'option_id' => $option,
                    'created_at' => date('Y-m-d H:i:s', time()),
                    'updated_at' => date('Y-m-d H:i:s', time()),
                ]);
            }
        }
        Session::flash('success', 'Thank you for your cooperation!');

        return redirect('surveys/' . $id);
    }
}
