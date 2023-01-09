<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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
    //return $request->user();
//});
Route::get('/students', [StudentController::class,'getData']);
Route::post('/students', [StudentController::class,'storeData']);
Route::post('/students/{id}', [StudentController::class,'updateData']);
Route::delete('/students/{id}', [StudentController::class,'deleteData']);
Route::post('/upload', [StudentController::class,'uploadImage']);