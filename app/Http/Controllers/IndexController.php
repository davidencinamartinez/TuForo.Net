<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Order;
use App\Mail\OrderShipped;
use Jenssegers\Agent\Agent;

class IndexController extends Controller {

    public function index() {

      $agent = new Agent(); // DEVICE INFO

		// THREAD INFO
		$threads = DB::table('threads')->orderBy('last_reply_time', 'DESC');

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

      if ($agent->isMobile()) {
         return view('mobile.index', [  'threadData' => $threads->paginate(2),
                           'countMembers' => $countMembers,
                           'countThreads' => $countThreads,
                           'countMessages' => $countMessages,
                           'countVisitors' => $countVisitors,
                           'countOnline' => $countOnline
         ]);
      } else {
         return view('index', [  'threadData' => $threads->paginate(40),
                           'countMembers' => $countMembers,
                           'countThreads' => $countThreads,
                           'countMessages' => $countMessages,
                           'countVisitors' => $countVisitors,
                           'countOnline' => $countOnline
         ]);   
      }
   }
   
   public function catIndex() {

   		// GET ALL CATEGORIES

   		$categories = DB::table('categories')->get();
   		return view('forum', [	'catData' => $categories
   		]);
   }

   public function store(Request $request) {
      try {
         $user = DB::table('users')->where('name', '=', $request->input('reg_username'));
         
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
      } catch ( \Illuminate\Database\QueryException $e){
         return view('errors.500');
      }
 
   }

   public function catThreads($category) {
      try {
         $catAvailable = DB::table('categories')->where('url', '=', $category);
        if ($catAvailable->count() > 0) {
         $threads_cat = DB::table('categories')->where('url', '=', $category)->value('id');
         $threads =   DB::table('threads')->where('category', '=', $threads_cat)->get();
      	return view('threadByCategory', [	'catData' => $threads
      	]);
      } else {
         return view('errors.404');
      }}catch( \Illuminate\Database\QueryException $e){
         return view('errors.500');
      }
   }
}