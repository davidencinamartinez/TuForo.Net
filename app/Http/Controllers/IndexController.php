<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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
		$countVisitors = DB::table('threads')->sum('view_count');

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

   		$categories = DB::table('categories')->get();
   		return view('forum', [	'catData' => $categories
   		]);
   }

   public function store(Request $request) {
   		DB::table('users')->insert([
   			[	'name' => $request->input("reg_username"),
   				'email' => $request->input("reg_email"),
   				'password' => Hash::make($request->input('reg_password')),
   				'remember_token' => $request->input("_token"),
   				'created_at' => Carbon::now(),
   				'updated_at' => Carbon::now(),
   				'user_pic' => '/storage/src/logos/logo128.png',
   				'user_title' => 'Miembro de TuForo.Net'
   			]
   		]);
   }

   public function catThreads($category) {
   	$threads_cat = DB::table('categories')->where('url', '=', $category)->value('id');
   	$threads = 	DB::table('threads')->where('category', '=', $threads_cat)->get();

   	return view('threadByCategory', [	'catData' => $threads
   	]);
   }
}