<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentMarkController;

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

Route::resource('student', StudentController::class);
Route::get('edit-student/{id}', [StudentController::class, 'editStudent']);
Route::post('update-student', [StudentController::class, 'updateStudent']);
Route::post('delete-student/{id}', [StudentController::class, 'deleteStudent']);
Route::resource('student-marks', StudentMarkController::class);
Route::get('add-student-marks', [StudentMarkController::class, 'addStudentMark']);
Route::get('edit-student-marks/{id}', [StudentMarkController::class, 'editStudentMark']);
Route::post('update-student-marks/{id}', [StudentMarkController::class, 'updateStudentMark']);
Route::post('delete-student-marks/{id}', [StudentMarkController::class, 'deleteStudentMark']);

Route::get('/', function () {
    return view('home');
});
