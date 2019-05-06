<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class IndexController extends Controller {

    public function index() {

		// THREAD INFO
		$threads = json_encode(DB::table('threads')->orderBy('last_reply_time', 'DESC')->get());

		// COUNT MEMBERS
		$countMembers = DB::table('users')->count();

		// COUNT THREADS
		$countThreads = DB::table('threads')->count();

		// COUNT MESSAGES
		$countMessages = DB::table('messages')->count();

		// COUNT VISITORS
		$countVisitors = DB::table('threads')->sum('view_count')+1;

		// COUNT ONLINE
		$countOnline = DB::table('users')->where('last_activity', '>=', \DB::raw('DATE_SUB(NOW(), INTERVAL 1 HOUR)'))->count();
		
		// RESPONSE
		return view('index', [	'threadData' => $threads,
								'countMembers' => $countMembers,
								'countThreads' => $countThreads,
								'countMessages' => $countMessages,
								'countVisitors' => $countVisitors,
								'countOnline' => $countOnline
		]);
   }
   
   public function catIndex() {

   		// GET ALL CATEGORIES

   		$categories = json_encode(DB::table('categories')->orderBy('id', 'ASC')->get());

   		return view('forum', [	'catData' => $categories
   		]);
   }
}
