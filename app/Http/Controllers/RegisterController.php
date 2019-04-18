<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create() {

        return view('register');

    }

    public function index() {
      $msg = DB::table('users')->count();

      return Response::json($msg);

   }
}
