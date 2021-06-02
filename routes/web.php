<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Routes For Students
Route::group([
    'name' => 'student.',
    'prefix' => 'student',
    'namespace' => 'App\Http\Controllers',
    'middleware' => ['auth', 'role:student']
], function () {
    Route::get('home', 'StudentController@index')->name('student-home');
    Route::get('proposal', 'StudentController@proposal')->name('student-proposal');
    Route::get('thesis', 'StudentController@thesis')->name('student-thesis');
});

// Routes For Supervisors
Route::group([
    'name' => 'supervisor.',
    'prefix' => 'supervisor',
    'namespace' => 'App\Http\Controllers',
    'middleware' => ['auth', 'role:supervisor']
], function () {
    Route::get('home', 'supervisorController@index')->name('supervisor-home');
    Route::get('proposal', 'supervisorController@proposal')->name('supervisor-proposal');
    Route::get('thesis', 'supervisorController@thesis')->name('supervisor-thesis');
});

// Routes For HOD
Route::group([
    'name' => 'hod.',
    'prefix' => 'hod',
    'namespace' => 'App\Http\Controllers',
    'middleware' => ['auth', 'role:hod']
], function () {
    Route::get('home', 'hodController@index')->name('hod-home');
    Route::get('proposal', 'hodController@proposal')->name('hod-proposal');
    Route::get('thesis', 'hodController@thesis')->name('hod-thesis');
});

// Routes For FHDC
Route::group([
    'name' => 'fhdc.',
    'prefix' => 'fhdc',
    'namespace' => 'App\Http\Controllers',
    'middleware' => ['auth', 'role:fhdc']
], function () {
    Route::get('home', 'hdcController@index')->name('hdc-home');
    Route::get('application', 'hdcController@application')->name('hdc-application');
    Route::get('proposal', 'hdcController@proposal')->name('hdc-proposal');
    Route::get('thesis', 'hdcController@thesis')->name('hdc-thesis');
});

// Routes For Admin
Route::group([
    'name' => 'admin.',
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers',
    'middleware' => ['auth', 'role:administrator']
], function () {
    Route::get('home', 'adminController@index')->name('admin-home');
    Route::get('users', 'adminController@users')->name('admin-create');
    Route::get('/edit/{id}', 'adminController@edit')->name('admin-edit');
    Route::post('createStudent', 'adminController@createStudent')->name('createStudent');
    Route::post('/edit/{id}', 'adminController@editUser');
    Route::post('createSupervisor', 'adminController@createSupervisor')->name('createSupervisor');
});

Route::post('/admin/edit/{id}', 'App\Http\Controllers\adminController@editUser');
Route::post('/admin/editPassword/{id}', 'App\Http\Controllers\adminController@editPassword');
Route::get('/admin/users/search','App\Http\Controllers\adminController@action')->name('search');