<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
   // return $request->user();
//});


Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);


//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    Route::get('/project', [App\Http\Controllers\API\ApiController::class, 'projectList']);
    Route::get('/assignList', [App\Http\Controllers\API\ApiController::class, 'assignProjectList']);
    Route::post('/projectAdd', [App\Http\Controllers\API\ApiController::class, 'createProject']);
    Route::post('/user', [App\Http\Controllers\API\ApiController::class, 'userList']);
    Route::patch('/updateProject', [App\Http\Controllers\API\ApiController::class, 'updateProject']);
    

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
    
    
});
