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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth', 'admin')->namespace('Admin')->prefix('admin')->group(function () {
    Route::get('dashboard','DashboardController@index');

    Route::get('department','DepartmentController@index');
    Route::post('department','DepartmentController@store')->name('department.store');
    Route::get('department/{id}/edit', 'DepartmentController@edit')->name('department.edit');
    Route::post('department/update', 'DepartmentController@update')->name('department.update');
    Route::get('department/{id}/delete', 'DepartmentController@destroy')->name('department.delete');

    Route::get('student','StudentController@index');
    Route::post('student','StudentController@store')->name('student.store');
    Route::get('student/{id}/edit', 'StudentController@edit')->name('student.edit');
    Route::post('student/update', 'StudentController@update')->name('student.update');
    Route::get('student/{id}/delete', 'StudentController@destroy')->name('student.delete');

  


    Route::get('course','CourseController@index');
    Route::post('course','CourseController@store')->name('course.store');
    Route::get('course/{id}/edit', 'CourseController@edit')->name('course.edit');
    Route::post('course/update', 'CourseController@update')->name('course.update');
    Route::get('course/{id}/delete', 'CourseController@destroy')->name('course.delete');


    Route::get('profile','SettingController@index');
    Route::post('profile/update','SettingController@update');

    Route::get('password','SettingController@password');
    Route::put('password/update','SettingController@password_update');
   
});





Route::middleware('auth', 'student')->namespace('Student')->prefix('student')->group(function () {
    Route::get('dashboard','DashboardController@index');


    Route::get('profile','SettingController@index');
    Route::post('profile/update','SettingController@update');

    Route::get('password','SettingController@password');
    Route::put('password/update','SettingController@password_update');
});