<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testing() {
    
    	$date = date('d-m-Y	H-i-s');
    	return ($date);
    }
}