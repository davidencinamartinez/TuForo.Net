<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ThreadController extends Controller {
    
	public function getThreadsIndex($id) {

		$threads = 	DB::SELECT('SELECT m.created_at as msg_created_at, m.id, m.on_thread_id, u.name, u.user_title, u.user_pic, u.created_at, u.msg_count, m.content, t.thread FROM messages m, users u, threads t WHERE t.id = '.$id.' AND m.thread_id = t.id AND m.creator = u.id');

		DB::table('threads')->where('id','=',$id)->increment('view_count');

		$thread_title = DB::table('threads')->where('id','=',$id)->pluck('thread');

		return view('thread', 	[	'threadData' => json_encode($threads)	]);
	}

	public function submitReply(Request $request, $id) {

		$on_thread_id = DB::table('messages')->max('on_thread_id')->where('id','=',$id);

		DB::table('messages')->insert([
			[	'thread_id' => $request->input("thread_id"),
				'on_thread_id' => $on_thread_id,
				'creator' => 1,
				'content' => $request->input("content"),
				'created_at' => Carbon::now(),
   				'updated_at' => Carbon::now()
			]
		]);
   	}
}
