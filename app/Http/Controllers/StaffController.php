<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\gradesheet;
use App\User;


class StaffController extends Controller
{
  public function __construct(){
    $this->middleware('usercheck');
    $this->middleware('staffcheck');
  }
    public function main(){
    	return view('staff.main');
    }

    public function import(){
    	return view('staff.import');
    }

    public function archives(){
     $archives = gradesheet::distinct()->where('user_id',Auth::id())->orderBy('id', 'DESC')->get(['year','semester','subject_code']);
      // $archives = DB::select('select DISTINCT year,semester from gradesheets where user_id = ? order by id DESC', [Auth::id()]);
      
    	return view('staff.archives', compact('archives'));
    }

    public function upload(Request $request){

    	if(isset($_POST['importSubmit'])){
    
   
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
          
            fgetcsv($csvFile);
            
           
            while(($line = fgetcsv($csvFile)) !== FALSE){
               
                $find = gradesheet::where('lastname',$line[0])->where('firstname',$line[1])->where('semester',$line[7])->where('year', $line[8])->first();
                

               
                $find = User::find(Auth::id());
                    $user = new gradesheet;
                    $user->lastname = $line[0];
                    $user->firstname = $line[1];
                    $user->course = $line[2];
                    $user->midterm = $line[3];
                    $user->final = $line[4];
                    $user->semestral_equivalent = $line[5]; 
                    $user->semestral_grade = $line[6];
                    $user->semester = $line[7];
                    $user->year = $line[8];
                    $user->remarks = $line[9];
                    $user->subject_code = $line[10];
                    $find->gradesheets()->save($user);
            }
            
          
            fclose($csvFile);

            return redirect()->route('staff_archives')->with('info','Uploaded Data Successfully!');
        }else{
            return 'error uploading files';
        }
    }else{
            return 'invalid files';
        }
    }

    }

    public function gradesheet($year, $semester,$subject){
      $find = gradesheet::where('year',$year)->where('semester', $semester)->where('subject_code',$subject)->first();  
      $grades = gradesheet::where('year', $year)->where('semester', $semester)->where('user_id', Auth::id())->where('subject_code',$subject)->paginate(25);
      return view('staff.gradesheet', compact('grades','find'));
    }









    public function logout(){
      Auth::logout();
      return redirect('auth/login');
    }

}
