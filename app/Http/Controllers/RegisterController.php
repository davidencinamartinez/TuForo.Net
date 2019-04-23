<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RegisterController extends Controller
{
    public function create() {

        return view('register');

    }

    public function index() {
      $data = DB::select('select username from users');
      
      
      //return response()->json(['data'=>$data]);
      return view('lol', ['mydata' => $data]);


   }
}
