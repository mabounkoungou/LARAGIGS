<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    //Want to return the login and signup views

    public function registration(){
        return view('account.registration');
    }
    public function login(){
        return view('account.login');
    }
}
