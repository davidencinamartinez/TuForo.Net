<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use DB;

class NewThreadController extends Controller
{
    public function index() {
      $categories = DB::table('categories')->where('id','!=',1)->get();
      
      return view('newthread')->with('cat', $categories);
   }

   public function newThreadStore(Request $request) {

   		// VARS 

   			$t_cat = DB::table('categories')->where('url', '=', $request->input('thread_category'))->value('id');
   			$t_id = DB::table('threads')->max('id');
 
   		// USERS UPDATE

   			DB::table('users')->where('id', '=', auth()->guard()->id())->update(
   				[
   					'last_activity' => Carbon::now()->format('Y-m-d H:i:s'),
   					'thread_count' => DB::raw('thread_count + 1')
   				]
   			);

   		// THREAD CREATION

   			DB::table('threads')->insert([
				[	'category' => $t_cat,
					'thread' => $request->input('thread_title'),
					'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	   				'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
	   				'creator' => auth()->guard()->user()->name,
	   				'last_reply_time' => Carbon::now()->format('Y-m-d H:i:s'),
	   				'last_reply_user' => auth()->guard()->user()->name
	   			]
			]);

		// MESSAGE CREATION

   			DB::table('messages')->insert([
				[	'thread_id' => $t_id,
					'on_thread_id' => 1,
					'creator' => auth()->guard()->id(),
					'content' => $request->input('content'),
					'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	   				'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
   				]
   			]);
			
			return Redirect::to('/');
	}
}
