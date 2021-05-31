<?php

use Illuminate\Support\Facades\Route;

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


// Simple navegation routes
use App\Http\Controllers\NavegationController;
Route::get('/' , [NavegationController::class,'index_page']);
Route::get('/people' , [NavegationController::class,'people_page']);
Route::get('/shiporders' , [NavegationController::class,'shiporders_page']);
Route::get('/users' , [NavegationController::class,'users_page']);

// Simple process route
use App\Http\Controllers\ProcessController;
Route::post('/save-file-people' , [ProcessController::class,'save_file_people']);
Route::post('/save-file-orders' , [ProcessController::class,'save_file_orders']);



