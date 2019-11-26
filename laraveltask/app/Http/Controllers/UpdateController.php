<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\apimodel;

class UpdateController extends Controller
{
    public function Update(Request $request, $id)
    {
    	//$id=$request->input('rowID');

    //dd(['emp_name'    => $request->input('ename')]);
    	$student = apimodel::find($id);
    	//dd($students);
    	
    	   $student->emp_name    = $request->input('ename');
             $student->emp_description     =  $request->get('edes');
             $student->emp_email     =  $request->get('email');
             $student->emp_phone     =  $request->get('ephone');
       // dd($student);
        $student->save();
       // return response ()->json ( $student );
    }
}
