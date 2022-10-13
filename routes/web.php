<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\GpioApiController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/backend', [BackendController::class, 'index'])
    ->name('backend');


Route::get('/gpio', [GpioApiController::class, 'index'])
    ->name('gpio');