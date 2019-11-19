<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DB;
use Auth;
use Jenssegers\Agent\Agent;

class ThreadController extends Controller {
    
	public function getThreadsIndex($id) {

		$agent = new Agent(); // DEVICE INFO

		try {
			$threadAvailable = DB::table('threads')->where('id', '=', $id);

			if ($threadAvailable->count() > 0) {

				$threads = DB::table('messages')
			    ->join('users', 'users.id', '=', 'messages.creator')
			    ->join('threads', 'threads.id', '=', 'messages.thread_id')
			    ->where('threads.id', $id)
			    ->select('messages.created_at as msg_created_at','messages.id','messages.on_thread_id','users.name','users.user_title','users.user_pic','users.created_at as reg_date','users.msg_count','messages.content','threads.thread')
			    ->orderBy('messages.on_thread_id');

				DB::table('threads')->where('id','=',$id)->increment('view_count');

				$thread_title = DB::table('threads')->where('id','=',$id)->value('thread');

				if ($agent->isMobile()) {
					return view('mobile.thread', 	[	'threadData' => $threads->paginate(25),
												'threadTitle' => $thread_title
					]);
				} else {
					return view('thread', 	[	'threadData' => $threads->paginate(40),
												'threadTitle' => $thread_title
					]);
				}
			} else {
				return view('errors.404');		
			}
		}catch( \Illuminate\Database\QueryException $e){
         return view('errors.500');
      }
	}

	public function submitReply(Request $request) {

		$on_thread_id = DB::table('messages')->where('thread_id','=',$request->input('thread_id'))->max('on_thread_id')+1;
		$creator = DB::table('users')->where('name', '=', $request->input('creator'))->value('id');
		$thread_cat = DB::table('threads')->where('id', '=', $request->input('thread_id'))->value('category');
		$thread_title = DB::table('threads')->where('id', '=', $request->input('thread_id'))->value('thread');

		DB::table('messages')->insert([
			[	'thread_id' => $request->input('thread_id'),
				'on_thread_id' => $on_thread_id,
				'creator' => $creator,
				'content' => $request->input('content'),
				'created_at' => Carbon::now(),
   				'updated_at' => Carbon::now()
			]
		]);

		// INCREMENTS

		DB::table('users')->where('name', '=', $request->input('creator'))->increment('msg_count');
		
		DB::table('threads')->where('id', '=', $request->input('thread_id'))->increment('reply_count');

		// UPDATE

		DB::table('threads')->where('id', '=', $request->input('thread_id'))->update([
			'updated_at' => Carbon::now(),
			'last_reply_time' => Carbon::now(),
			'last_reply_user' => $request->input('creator'),
		]);

		DB::table('users')->where('id', '=', $creator)->update([
			'last_activity' => Carbon::now()
		]);

		DB::table('categories')->where('id', '=', $thread_cat)->update(
		   [  'last_msg_title' => $thread_title,
		      'last_msg_time' => Carbon::now()->format('Y-m-d H:i:s')
		   ]
		);

		return back();
   	}
}