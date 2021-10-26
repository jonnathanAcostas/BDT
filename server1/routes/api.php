<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::get('/users', function (Request $request) {
  //  return "hola";
//});

Route::get('/users',[UserController::class,'index']); // Get users
Route::post('/register',[UserController::class,'register']); // Singup URL 
Route::post('/login',[UserController::class,'login']); // lOGIN url
Route::get('/edit-user/{id}',[UserController::class,'edit']); // lOGIN url
Route::put('/update-user/{id}',[UserController::class,'update']); //Update user
Route::delete('delete-user/{id}',[UserController::class,'destroy']); //delete user



