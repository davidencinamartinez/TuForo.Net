<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TrackerController extends Controller
{
    public function index() {

    	// COUNT MEMBERS
   		$countMembers = DB::table('users')->count();
    // COUNT THREADS
   		$countThreads = DB::table('threads')->count();
   	// COUNT MESSAGES
   		$countMessages = DB::table('messages')->count();
   	// RESPONSE
    	return view('index', [	'countMembers' => $countMembers,
    							'countThreads' => $countThreads,
    							'countMessages' => $countMessages
		]);
    }
}