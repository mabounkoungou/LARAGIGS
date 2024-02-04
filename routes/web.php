<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
 //   return view('welcome');
//});

Route::get("/", [HomeController::class,"index"])->name("home");
Route::group(['account'], function(){
    //Guest Route

    Route::group(['middleware' => 'guest'], function(){
        Route::get("/account/register",[AccountController::class,"registration"])->name("account.registration");
        Route::post("/account/process-register",[AccountController::class,"processRegistration"])->name("account.processRegistration");
        Route::get("/account/login",[AccountController::class,"login"])->name("account.login");
        Route::post("/account/authenticate",[AccountController::class,"authenticate"])->name("account.authenticate");
    });


    Route::group(['middleware' => 'auth'], function(){

    //Authenticated Route

Route::get("/account/profile",[AccountController::class,"profile"])->name("account.profile");
Route::get("/account/logout",[AccountController::class,"logout"])->name("account.logout");
        
    });


});



