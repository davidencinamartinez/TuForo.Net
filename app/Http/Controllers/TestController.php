<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\DNSCheckValidation;
use Egulias\EmailValidator\Validation\MultipleValidationWithAnd;
use Egulias\EmailValidator\Validation\RFCValidation;
use Validator;



class TestController extends Controller
{


    /**
     * Display a listing of the myform.
     *
     * @return \Illuminate\Http\Response
     */
    public function myform()
    {
    	return view('test');
    }


    /**
     * Display a listing of the myformPost.
     *
     * @return \Illuminate\Http\Response
     */
    public function myformPost(Request $request)
    {

        $messages = [
            'first_name.required' => 'PARA BAILAR LA BAMBA.',
        ];

    	$validator = Validator::make($request->all(), [
            'first_name' => 'required|min:6|max:20|unique:users,name|',
            'email' => 'required|email|ends_with:gmail.com,hotmail.com,hotmail.es,@live.com,@outlook.com,yahoo.com,yahoo.es',
        ], $messages);


        if ($validator->passes()) {


			return response()->json(['success'=>'Added new records.']);
        }


    	return response()->json(['error'=>$validator->errors()->all()]);
    }
}