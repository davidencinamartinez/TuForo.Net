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
    	if ($user != null && Hash::check(Input::get('password'), $user->password)) {
    		Auth::login($user);
            DB::table('users')->where('name', '=', Input::get('user'))->update(['last_activity' => Carbon::now()]);
    		return back();
    	} else {
             return redirect()->back()->with('err','Usuario o contraseña incorrectos. Vuelva a probar de nuevo.');
        }
    }

    protected function logout() {
        Auth::logout();
        return Redirect::to('/');
    }

    public function getProfile($name) {
            $user = DB::table('users')->where('name', '=', $name)->get();
            if ($user->count() > 0) {
                $username = DB::table('users')->where('name', '=', $name)->value('name');
                return view('profile', [    'userData' => $user,
                                            'title' => $username
                ]);
            } else {
            return view('errors.404');
            }
        }

    public function updateProfile(Request $request) {
        try {
            DB::table('users')->where('id', '=', $request->input('id'))->update(
               [  'user_title' => $request->input('user_title'),
                  'user_pic' => $request->input('user_pic')
               ]
            );
            return back();
        } catch( \Illuminate\Database\QueryException $e){
         return view('errors.500');
        }
    } 
}
