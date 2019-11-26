<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input, Redirect,Session,Image;
use Illuminate\Support\Facades\Validator;
use App\apimodel;
use App\emp_model;
class apiController extends Controller
{
    public function index()
    { //echo "string";die();
     
        //$emp_details = apimodel::orderBy('updated_at')->get();
         $emp_details = apimodel::orderBy('updated_at')->get();
        //dd($emp_details);
   
   return json_encode(array('emp_details' =>  $emp_details)
 //       return json_encode(array($emp_details)
     );


    }

   
}