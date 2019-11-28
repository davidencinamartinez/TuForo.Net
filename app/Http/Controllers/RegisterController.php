<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Validator;

class RegisterController extends Controller {

    public function form() {

    	$agent = new Agent(); // DEVICE INFO
		
		if ($agent->isMobile()) {
        	return view('mobile.register');
        } else {
        	return view('register');
        }

    }

    public function store(Request $request) {

    	$messages = [

    		// USERNAME

        	'reg_username.required' => 'Campo obligatorio',
        	'reg_username.unique' => 'El nombre de usuario ya existe',
        	'reg_username.min' => 'El nombre de usuario debe contener mínimo 6 carácteres',
        	'reg_username.max' => 'El nombre de usuario debe contener máximo 20 carácteres', 

            // MAIL

            'reg_email.required' => 'Campo obligatorio',
            'reg_email.unique' => 'El correo electrónico introducido ya está en uso',
            'reg_email.email' => 'Debes introducir una dirección de correo válida',
            'reg_email.min' => 'La dirección de correo debe contener mínimo 12 carácteres',
            'reg_email.max' => 'La dirección de correo debe contener máximo 64 carácteres',
            'reg_email.ends_with' => 'Debes introducir una dirección de correo válida',

            // PASSWORD

            'reg_password.required' => 'Campo obligatorio',
            'reg_password.min' => 'La contraseña debe contener mínimo 8 carácteres',
            'reg_password.max' => 'La contraseña debe contener máximo 64 carácteres',

            // PASSWORD VERIFICATION

            'reg_passwordVerified.required' => 'Campo obligatorio',
            'reg_passwordVerified.same' => 'Las contraseñas no coinciden',

            // CAPTCHA

            'reg_captcha.required' => 'Verifica que eres humano',

            // TERMS

            'reg_terms.accepted' => 'Debes aceptar las condiciones de TuForo.Net'

        ];

    	$validator = Validator::make($request->all(), [
            'reg_username' => 'required|unique:users,name|min:6|max:20',
            'reg_email' => 'required|unique:users,email|min:12|max:64|ends_with:@gmail.com,@hotmail.com,@hotmail.es,@live.com,@outlook.com,@yahoo.com,@yahoo.es',
            'reg_password' => 'required|min:8|max:255',
            'reg_passwordVerified' => 'required|same:reg_password',
            'reg_captcha' => 'required',
            'reg_terms' => 'accepted'
        ], $messages);

    	// IF VALIDATOR OK

        if ($validator->passes()) {
        	DB::table('users')->insert([
       			[	'name' => $request->input("reg_username"),
                   	'email' => $request->input("reg_email"),
       				'password' => Hash::make($request->input('reg_password')),
       				'remember_token' => $request->input("_token"),
       				'created_at' => Carbon::now(),
       				'updated_at' => Carbon::now(),
       				'user_pic' => '/storage/src/logos/logo128.png',
       				'user_title' => 'Miembro de TuForo.Net'
       			]
       		]);
			return response()->json(['success'=>'Added new records.']);
        }
    	return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
    }

    public function checkUser(Request $request) {
    	$check = DB::table('users')->where('name', '=', $request->get('user'))->count();
    	if ($check > 0) {
    		echo '1';
    	} else {
    		echo '0';
    	}
    }

    public function checkMail(Request $request) {
    	$check = DB::table('users')->where('email', '=', $request->get('mail'))->count();
    	if ($check > 0) {
    		echo 'true';
    	} else {
    		echo 'false';
    	}
    }
}
