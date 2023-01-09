<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
   // return view('welcome');
//});

Auth::routes();

Route::get('/home', [HomeController::class,'index'])->name('home');
Route::get('/', [FrontendController::class,'welcome']);
Route::get('/about', [FrontendController::class,'about']);
Route::get('/contact', [FrontendController::class,'contact']);

// users
Route::post('/add/users', [HomeController::class, 'add_users']);

//Student
Route::get('/student',[StudentController::class,'index']);
Route::post('add-student',[StudentController::class,'store']);
Route::get('edit-student/{id}',[StudentController::class,'edit']);
Route::put('update-student/{id}',[StudentController::class,'update']);
Route::delete('delete-student/{id}',[StudentController::class,'delete']);