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

    Route::post('/backend/deleteClasses', [BackendController::class, 'deleteClass'])
        ->name('deleteClass');

    Route::get('/backend/rooms', [BackendController::class, 'getRooms'])
        ->name('rooms');

    Route::post('/backend/createRoom', [BackendController::class, 'createRoom'])
        ->name('createRoom');

    Route::post('/backend/deleteRoom', [BackendController::class, 'deleteRoom'])
        ->name('deleteRoom');

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

    Route::post('/backend/deleteStudent', [BackendController::class, 'deleteStudent'])
        ->name('deleteStudent');

    Route::post('/backend/importStudents', [BackendController::class, 'importStudents'])
        ->name('importStudents');

    Route::get('/backend/groups', [BackendController::class, 'getGroups'])
        ->name('groups');

    Route::post('/backend/saveGroup', [BackendController::class, 'saveGroup'])
        ->name('saveGroup');
        
    Route::get('/backend/createGroup/First', [BackendController::class, 'prepareFormOne'])
        ->name('prepareFormOne');

    Route::Post('/backend/createGroup/Second', [BackendController::class, 'prepareFormTwo'])
        ->name('prepareFormTwo');
    
    Route::Post('/backend/createGroup', [BackendController::class, 'processForm'])
        ->name('processForm');

    Route::post('/backend/deleteGroup', [BackendController::class, 'deleteGroup'])
        ->name('deleteGroup');

    Route::get('/backend/teacher', [BackendController::class, 'getTeachers'])
        ->name('teachers');

    Route::post('/backend/createTeacher', [BackendController::class, 'createTeacher'])
        ->name('createTeacher');

    Route::post('/backend/saveTeacher', [BackendController::class, 'saveTeacher'])
        ->name('saveTeacher');

    Route::post('/backend/deleteTeacher', [BackendController::class, 'deleteTeacher'])
        ->name('deleteTeacher');

    Route::get('/gpio/{type}', [GpioApiController::class, 'setFlag'])
        ->name('gpio');

    Route::get('/werbung', [WerbungController::class, 'index'])
        ->name('werbung');

    Route::get('/info/{slideIdx?}', [InfoController::class, 'index'])
        ->name('info');


