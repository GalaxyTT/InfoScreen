<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\GpioApiController;
use App\Http\Controllers\WerbungController;
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

    Route::get('/backend/classes', [BackendController::class, 'getClasses'])
        ->name('classes');

    Route::get('/backend/groups', [BackendController::class, 'getGroups'])
        ->name('groups');

    Route::get('/backend/settings', [BackendController::class, 'getSettings'])
        ->name('settings');

    Route::get('/gpio/{type}', [GpioApiController::class, 'setFlag'])
        ->name('gpio');

    Route::get('/werbung', [WerbungController::class, 'index'])
        ->name('werbung');

    Route::get('/info', function()
    {
        return view('info');
    });


