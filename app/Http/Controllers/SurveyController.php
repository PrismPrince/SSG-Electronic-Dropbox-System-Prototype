<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
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
        //$carbon = new Carbon;
        //$surveys = Survey::orderBy('updated_at', 'desc')->paginate(15);
        //$count = $this->countSurveys();
        //return view('surveys.index')->withSurveys($surveys)->withCount($count)->withCarbon($carbon);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carbon = new Carbon;

        $totalVotes = 0;

        $survey = Survey::findOrFail($id);
        $getOption = Option::where('survey_id', $id)->get();

        foreach ($getOption as $option) {
            $totalVotes += count($option->students);
        }

        foreach ($survey->options as $option) {
            $voteCount = count($option->students);
            $votesPercent[$option->id] = $voteCount;
        }

        $votes = $this->votesPercent($votesPercent, $totalVotes);

        return view('surveys.show')->withSurvey($survey)->withVotes($votes)->withCarbon($carbon);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $getOption = Option::where('survey_id', $id)->get();

        foreach ($getOption as $option) {
            $totalVotes += count($option->students);
        }

        foreach ($survey->options as $option) {
            $voteCount = count($option->students);
            $votesPercent[$option->id] = $voteCount;
        }

        $votes = $this->votesPercent($votesPercent, $totalVotes);

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
        //$count['all'] = Post::all()->count();
        //$count['me'] = Post::where('user_id', Auth::user()->id)->get()->count();
        //$count['other'] = Post::where('user_id','!=', Auth::user()->id)->get()->count();

        //return $count;
    }

    private function votesPercent($votes, $total) {
        foreach ($votes as $id => $vote) {
            $percent[$id] = ($vote / $total) * 100;
        }
        return $percent;
    }
}
