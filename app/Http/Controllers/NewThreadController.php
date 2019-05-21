<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class NewThreadController extends Controller
{
    public function index() {
      $categories = DB::table('categories')->get();
      
      return view('newthread')->with('cat', $categories);
   }
}
