<?php

namespace App;

use Illuminate\Database\Eloquent\model;
class apimodel extends model
{

	protected $table='table_emp';
	public $timestamp= false;
	protected $primary_key= 'id';
	protected $fillable = ['emp_name','emp_description','emp_email','emp_phone'];
}


 ?>