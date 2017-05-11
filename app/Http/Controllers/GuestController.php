<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\gradesheet;

class GuestController extends Controller
{
    public function main(){
    	return view('guest.main');
    }

    public function search(Request $request){
    	$this->validate($request, [
    		'lastname' => 'required',
    		'firstname'=> 'required',
    		'course' => 'required|max:10',
    		'semester'=> 'required|max:3',
    		'year'=> 'required|max:10'
    	]);
    	$lastname = $request['lastname'];
    	$firstname = $request['firstname'];
    	$course = $request['course'];
    	$semester = $request['semester'];
    	$year = $request['year'];
    	$grades = gradesheet::where('lastname','LIKE',"%{$lastname}%")->where('firstname','LIKE',"%{$firstname}%")->where('course','LIKE',"%{$course}%")->where('semester','LIKE',"%{$semester}%")->where('year','LIKE',"%{$year}%")->get();

    	return view('guest.search', compact('grades'));

    }
}
