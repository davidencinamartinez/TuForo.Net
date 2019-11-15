<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Order;
use App\Mail\OrderShipped;

class MobileController extends Controller {

    public function index() {

		// THREAD INFO
		$threads = DB::table('threads')->orderBy('last_reply_time', 'DESC')->get();

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
		return view('mobile', [	'threadData' => $threads,
								'countMembers' => $countMembers,
								'countThreads' => $countThreads,
								'countMessages' => $countMessages,
								'countVisitors' => $countVisitors,
								'countOnline' => $countOnline
		]);
   }
}