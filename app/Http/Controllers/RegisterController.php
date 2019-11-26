<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use DB;

class RegisterController extends Controller {

    public function create() {

    	$agent = new Agent(); // DEVICE INFO
		
		if ($agent->isMobile()) {
        	return view('mobile.register');
        } else {
        	return view('register');
        }

    }

    public function checkUser(Request $request) {
    	$check = DB::table('users')->where('name', '=', $request->get('user'))->count();
    	if ($check > 0) {
    		echo 'true';
    	} else {
    		echo 'false';
    	}
    }

    public function checkMail(Request $request) {
    	$check = DB::table('users')->where('email', '=', $request->get('mail'))->count();
    	if ($check > 0) {
    		echo 'true';
    	} else {
    		echo 'false';
    	}
    }
}
