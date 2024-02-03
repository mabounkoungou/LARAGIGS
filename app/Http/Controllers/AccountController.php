<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    //Want to return the login and signup views

    public function registration(){
        return view('account.registration');

    }

    public function processregistration(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email'=> 'required|email',
            'password'=> 'required|min:6|same:confirm_password',
            'confirm_password' => 'required'
            ]);

            if ($validator->passes()){

            }
            else{
                return response() -> json([
                    'status'=>false,
                    'message'=> $validator->errors()
                ]);

    }}
    public function login(){
        return view('account.login');
    }
}
