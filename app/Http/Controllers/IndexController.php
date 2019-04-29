<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class IndexController extends Controller
{
    public function index() {

		// THREAD INFO
		$threads = json_encode(DB::table('threads')->get());

		// COUNT MEMBERS
		$countMembers = DB::table('users')->count();

		// COUNT THREADS
		$countThreads = DB::table('threads')->count();

		// COUNT MESSAGES
		$countMessages = DB::table('messages')->count();

		// RESPONSE
		return view('index', [	'threadData' => $threads,
								'countMembers' => $countMembers,
								'countThreads' => $countThreads,
								'countMessages' => $countMessages
		]);
   }
}
