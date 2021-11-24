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
    Route::post('upload-files', 'StudentController@uploadProposalDocuments')->name('uploadProposalDocuments');
    Route::post('resubmit-upload-files', 'StudentController@resubmitProposalDocuments')->name('resubmitProposalDocuments');
    Route::post('resubmit-proposal-files', 'StudentController@resubmitHDCProposalDocuments')->name('resubmitHDCProposalDocuments');
    Route::post('resubmit-thesis-files', 'StudentController@resubmitThesisDocuments')->name('resubmitThesisDocuments');
    Route::post('upload-thesis', 'StudentController@uploadThesisDocuments')->name('uploadThesisDocuments'); // 
    Route::post('upload-thesis-correction', 'StudentController@submitThesisCorrection')->name('uploadThesisCorrection');
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
    Route::get('allStudents', 'supervisorController@allStudents')->name('supervisor-allStudents');
    Route::get('proposal-profile/{id}', 'supervisorController@studentProposalProfile')->name('supervisor.proposalProfile');
    Route::get('thesis-profile/{id}', 'supervisorController@studentThesisProfile')->name('supervisor.thesisProfile');
    Route::get('student-profile/{id}', 'supervisorController@studentProfile')->name('supervisor.studentProfile');
    Route::post('proposal-comments', 'supervisorController@proposalDocumentsComments')->name('proposalComments');
    Route::post('proposal-resubmission-comments', 'supervisorController@proposalDocumentsResubmissionComments')->name('proposalResubmissionComments');
    Route::post('thesis-comments', 'supervisorController@thesisDocumentsComments')->name('thesisComments');
    Route::post('thesis-resubmission-comments', 'supervisorController@thesisCorrectionComments')->name('thesisCorrectionComments');
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
    Route::get('profile/{id}', 'hodController@studentProfile')->name('hod.studentProfile');
    Route::get('allStudents', 'hodController@allStudentsRequiringEvaluation')->name('hod.allStudents');
    Route::get('proposal-profile/{id}', 'hodController@studentProposalProfile')->name('hod.studentProposalProfile');
    Route::get('thesis-profile/{id}', 'hodController@studentThesisProfile')->name('hod.studentThesisProfile');
    Route::post('assignMastersEvaluator', 'hodController@assignMastersEvaluators')->name('mastersEvaluators');
    Route::post('assignPhdEvaluator', 'hodController@assignPhdEvaluators')->name('phdEvaluators');
    Route::post('submit-checklist', 'hodController@checklistSubmit')->name('hod.checklist'); //hod.examiners_report
    Route::post('submit-examiners-report', 'hodController@examinersReportSubmit')->name('hod.examiners_report');
    Route::post('thesis-comments', 'hodController@thesisDocumentsComments')->name('hod.thesisComments');
    Route::post('thesis-resubmission-comments', 'hodController@thesisResubmissionComments')->name('hod.thesisResubmissionComments'); 
    Route::post('proposal-resubmission-comments', 'hodController@proposalDocumentsResubmissionComments')->name('hod.proposalResubmissionComments');
});

// Routes For FHDC
Route::group([
    'name' => 'fhdc.',
    'prefix' => 'fhdc',
    'namespace' => 'App\Http\Controllers',
    'middleware' => ['auth', 'role:fhdc']
], function () {
    Route::get('profile/{id}', 'hdcController@studentProfile')->name('student.profile');
    Route::get('home', 'hdcController@index')->name('hdc-home');
    Route::get('students', 'hdcController@allStudents')->name('hdc-allStudents');
    Route::get('application', 'hdcController@application')->name('hdc-application');
    Route::get('proposal', 'hdcController@proposal')->name('hdc-proposal');
    Route::get('thesis', 'hdcController@thesis')->name('hdc-thesis');
    Route::get('assign-supervisors', 'hdcController@assignSupervisors')->name('hdc.assignSupervisors');
    Route::get('proposal-profile/{id}', 'hdcController@studentProposalProfile')->name('hdc.studentProposalProfile');
    Route::get('thesis-profile/{id}', 'hdcController@studentThesisProfile')->name('hdc.studentThesisProfile');
    Route::get('profile/{id}', 'hdcController@studentProfile')->name('hdc.studentProfile');
    Route::post('addSupervisor', 'hdcController@addSupervisor')->name('addSupervisor');
    Route::post('addCoSupervisor', 'hdcController@addCoSupervisor')->name('addCoSupervisor');
    Route::post('proposal-comments', 'hdcController@hdcProposalComments')->name('hdc.proposalComments');
    Route::post('thesis-comments', 'hdcController@thesisDocumentsComments')->name('hdc.thesisComments');
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
    Route::post('createHOD', 'adminController@createHOD')->name('createHOD');
    Route::post('createFHDC', 'adminController@createFHDC')->name('createFHDC');
});

Route::post('/admin/edit/{id}', 'App\Http\Controllers\adminController@editUser');
Route::post('/admin/editPassword/{id}', 'App\Http\Controllers\adminController@editPassword');
Route::get('/admin/users/search','App\Http\Controllers\adminController@action')->name('search');
Route::get('/download/{file}', 'App\Http\Controllers\DownloadsController@download');