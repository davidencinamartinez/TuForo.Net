<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThreadController extends Controller {
    
	public function getThreadsIndex() {

		$threads = DB::table('')

		// SELECT m.created_at, m.id, u.name, u.user_title, u.user_pic, u.created_at, u.msg_count, m.content FROM messages m, users u, threads t WHERE t.id = 1 AND m.thread_id = t.id AND m.creator = u.id

	}
}
