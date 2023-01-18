Vikram

A brief description of what this project does and who it's for

![v-1](https://user-images.githubusercontent.com/97294949/213093942-0f434d86-2554-440f-9355-8f6f0c52941d.GIF)
![v-90](https://user-images.githubusercontent.com/97294949/213093982-e8a73bcf-0bd3-4ca2-b516-d62f6635868b.GIF)
![V-2](https://user-images.githubusercontent.com/97294949/213093644-d433730a-35ac-48cc-88ed-4d6ef94188db.GIF)
![v-5](https://user-images.githubusercontent.com/97294949/213093696-e912f9c9-17b6-4fc4-9954-5c6e72533fd9.GIF)



## Badges

Add badges from somewhere like: [shields.io](https://shields.io/)

[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)
[![GPLv3 License](https://img.shields.io/badge/License-GPL%20v3-yellow.svg)](https://opensource.org/licenses/)
[![AGPL License](https://img.shields.io/badge/license-AGPL-blue.svg)](http://www.gnu.org/licenses/agpl-3.0)


## 🚀 About Me
I'm a full stack developer...


## 🛠 Skills
Javascript, HTML, CSS...


## Installation

Install my- project with Gitbash

//First Project Installation Command
composer create-project laravel/laravel Vikram//
Composer require laravel/ui//
php artisan ui bootstrap --auth//
npm Install//
npm run dev//
php artisan migrate//
//End Installation
```bash
<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;


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

//Controller
php artisan make:controller FrontendController
php artisan make:controller HomeController
php artisan make:controller StudentController

//Models
php artisan make:Model Student -m
## API Reference

#### Get all items

```http
  GET /api/items
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `api_key` | `candidate_name` | **Required**. Your API key |

#### Get item

```http
  GET /api/items/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `2`      | `roll` | **Required**. Id of item to fetch |

#### add(num1, num2)

Takes two numbers and returns the sum.

