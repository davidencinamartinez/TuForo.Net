<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class NewThreadController extends Controller
{
    public function index() {
      $data = json_encode(DB::table('users')->get());
      
      return view('newthread', ['mydata' => $data]);

   }
}
