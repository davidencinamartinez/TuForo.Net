<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use DB;

class RegisterController extends Controller
{
    public function create() {

    	$agent = new Agent(); // DEVICE INFO
		
		if ($agent->isMobile()) {
        	return view('mobile.register');
        } else {
        	return view('register');
        }

    }
}
