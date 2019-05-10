<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThreadController extends Controller {
    
	public function getThreadsIndex() {

		$threads = 	DB::table(DB::raw('messages m, threads t, users u')) 
					->select(DB::raw('m.created_at, m.id, m.content, u.name, u.user_title, u.user_pic, u.created_at, u.msg_count'))
					->where('t.id', '=', 1)
					->where('m.thread_id', '=', 't.id')
					->where('m.creator', '=', 'u.id')
					->get();

		return view('thread', [	'threadData' => $threads]);
		// SELECT m.created_at, m.id, u.name, u.user_title, u.user_pic, u.created_at, u.msg_count, m.content FROM messages m, users u, threads t WHERE t.id = 1 AND m.thread_id = t.id AND m.creator = u.id

	}
}
