<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\User; 
use Hash;
use DB;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    protected function login(Request $request) {
    	$user = User::where('name', '=', Input::get('user'))->first();
    	if ($user != null) {
    		if (Hash::check(Input::get('password'), $user->password)) {
    			Auth::login($user);
                DB::table('users')->where('name', '=', Input::get('user'))->update(['last_activity' => Carbon::now()]);
    			return back();
    		}} else {
				return back()->with('err','Hsdasaf');
    		}
    }

    protected function logout() {
        Auth::logout();
        return Redirect::to('/');
    }
}
