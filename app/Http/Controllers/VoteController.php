<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Auth;
use Session;
use Validator;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class VoteController extends Controller
{
    public function vote(Request $request, $id)
    {
    	$rules = [
            'options[]' => 'required|',
            'student_id' => 'required|digits:7|exists:students,id',
            'fname' => 'required|exists:students,fname,id,' . $request->student_id,
            'lname' => 'required|exists:students,lname,id,' . $request->student_id,
        ];

        $messages = [
            'options[].required' => 'Select an atleast one.',
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
	    	foreach ($request->options as $option) {
		    	DB::table('option_student')->insert([
			        'student_id' => $request->student_id,
			        'option_id' => $option,
			        'created_at' => date('Y-m-d H:i:s', time()),
			        'updated_at' => date('Y-m-d H:i:s', time()),
		        ]);
        	}
    	}

    	return redirect('surveys/' . $id);
	    	//$student = Student;
	        //$option->
	        //$option->save();
    }
}
