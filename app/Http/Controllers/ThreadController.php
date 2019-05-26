<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DB;
use Auth;

class ThreadController extends Controller {
    
	public function getThreadsIndex($id) {

		try {
			$threadAvailable = DB::table('threads')->where('id', '=', $id);

			if ($threadAvailable->count() > 0) {
				
			$threads = 	DB::SELECT('SELECT m.created_at as msg_created_at, m.id, m.on_thread_id, u.name, u.user_title, u.user_pic, u.created_at, u.msg_count, m.content, t.thread FROM messages m, users u, threads t WHERE t.id = '.$id.' AND m.thread_id = t.id AND m.creator = u.id ORDER BY m.on_thread_id');

			DB::table('threads')->where('id','=',$id)->increment('view_count');

			$thread_title = DB::table('threads')->where('id','=',$id)->value('thread');

			return view('thread', 	[	'threadData' => $threads,
										'threadTitle' => $thread_title
			]);
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