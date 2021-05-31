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

use App\Http\Controllers\PeopleController;
Route::get('people' , [PeopleController::class,'index']);
Route::get('people/{id}' , [PeopleController::class,'show']);

use App\Http\Controllers\ShipOrdersController;
Route::get('shiporders' , [ShipOrdersController::class,'index']);
Route::get('shiporders/{id}' , [ShipOrdersController::class,'show']);
