<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentApiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/student/create', 'StudentController@create') ->name('student.create')->middleware('login_auth');;
Route::post('/student', 'StudentControler@store') ->name('student.store')->middleware('login_auth');;
Route::get('/student', 'StudentControler@index') ->name('student.index')->middleware('login_auth');;
Route::get('/student/{student}', 'StudentControler@show') ->name('student.show')->middleware('login_auth');
Route::get('/student/{student}/edit', 'StudentControler@edit') ->name('student.edit')->middleware('login_auth');;
Route::patch('/student/{student}', 'StudentControler@update') ->name('student.update')->middleware('login_auth');;
Route::delete('/student/{student}', 'StudentControler@destroy') ->name('student.destroy')->middleware('login_auth');;

Route::get('/login', 'StudentControler@index')->name('login.index');
Route::get('/logout', 'StudentControler@logout')->name('login.logout');
Route::post('/login', 'StudentControler@process')->name('login.process');

Route::get('/adminlte/index', 'AdminLTEController@index')->name('adminlte.index');
Route::get('/adminlte/student/create', 'AdminLTEStudentController@create')->name('adminlte.student.create');

Route::post('student', [StudentApiController::class, 'store']);
Route::get('student', [StudentApiController::class, 'index']);
Route::put('student/{id}', [StudentApiController::class, 'update']);
Route::delete('student/{id}', [StudentApiController::class, 'destroy']);
