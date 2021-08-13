<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;

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



Route::group(['middleware' => ['auth:sanctum']], function() {
    
    //busca all users
    Route::get('users', [UsuarioController::class, 'index']);

    //busca user
    Route::get('users/{id}', [UsuarioController::class, 'show']);

    //create new 
    Route::post('user', [UsuarioController::class, 'store']);
});



//cadastro 
Route::post('users/registrar', [AuthController::class, 'registrar']);

//login
Route::post('users/login', [AuthController::class, 'login']);




