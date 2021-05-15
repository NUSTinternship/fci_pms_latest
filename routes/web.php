<?php

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
Route::group(['middleware' => ['auth', 'role:student']], function() {
    Route::get('/student', 'App\Http\Controllers\StudentController@index')->name('student');
    Route::get('/proposal', 'App\Http\Controllers\StudentController@proposal')->name('proposal');
    Route::get('/thesis', 'App\Http\Controllers\StudentController@thesis')->name('thesis');
});

// Routes For Supervisors
Route::group(['middleware' => ['auth', 'role:supervisor']], function() {
    Route::get('/supervisor', 'App\Http\Controllers\supervisorController@index')->name('supervisor');
    Route::get('/proposal1', 'App\Http\Controllers\supervisorController@proposal')->name('superProposal');
    Route::get('/thesis1', 'App\Http\Controllers\supervisorController@thesis')->name('superThesis');
});

// Routes For HOD's
Route::group(['middleware' => ['auth', 'role:hod']], function() {
    Route::get('/hod', 'App\Http\Controllers\hodController@index')->name('hod');
    Route::get('/proposal2', 'App\Http\Controllers\hodController@proposal')->name('hodProposal');
    Route::get('/thesis2', 'App\Http\Controllers\hodController@thesis')->name('hodThesis');
});

// Routes For FHDC
Route::group(['middleware' => ['auth', 'role:fhdc']], function() {
    Route::get('/fhdc', 'App\Http\Controllers\hdcController@index')->name('fhdc');
    Route::get('/proposal3', 'App\Http\Controllers\hdcController@proposal')->name('fdc-proposal');
    Route::get('/thesis3', 'App\Http\Controllers\hdcController@thesis')->name('fdc-thesis');
    Route::get('/application', 'App\Http\Controllers\hdcController@application')->name('fdc-application');
});