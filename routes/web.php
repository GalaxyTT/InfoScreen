<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\GpioApiController;
use App\Http\Controllers\WerbungController;
use App\Http\Controllers\InfoController;
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

    Route::post('/backend/createClasses', [BackendController::class, 'createClass'])
        ->name('createClass');

    Route::get('/backend/settings', [BackendController::class, 'getSettings'])
        ->name('settings');
    
    Route::post('/backend/updateSettings', [BackendController::class, 'updateSettings'])
        ->name('updateSettings');

    Route::get('/backend/students', [BackendController::class, 'getStudents'])
        ->name('students');

    Route::get('/backend/createStudent', [BackendController::class, 'createStudent'])
        ->name('createStudent');
    
    Route::post('/backend/saveStudent', [BackendController::class, 'saveStudent'])
        ->name('saveStudent');

    Route::get('/backend/groups', [BackendController::class, 'getGroups'])
        ->name('groups');

    Route::post('/backend/saveGroup', [BackendController::class, 'saveGroup'])
        ->name('saveGroup');

    Route::get('/gpio/{type}', [GpioApiController::class, 'setFlag'])
        ->name('gpio');

    Route::get('/werbung', [WerbungController::class, 'index'])
        ->name('werbung');

    Route::get('/info', [InfoController::class, 'index'])
        ->name('info');


