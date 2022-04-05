<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\UserController;
use  App\Http\Controllers\AdminController;
use  App\Http\Controllers\PatientController;
use  App\Http\Controllers\DoctorController;
use  App\Http\Middleware\AUTH;
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

Route::get('/',[UserController::class,'HOME'])->name('home');

Route::get('/login',[UserController::class,'login'])->name('login');

Route::post('/login/submit',[UserController::class,'loginSubmit'])->name('login.submit');




Route::get('/admin/home',[AdminController::class,'home'])->Middleware('AUTH')->name('admin.home');

Route::get('/admin/add/doctor',[AdminController::Class,'docreg'])->Middleware('AUTH')->name('admin.doctor.reg');

Route::post('/admin/add/doctor/save',[AdminController::Class,'docregSubmit'])->Middleware('AUTH')->name('admin.doctor.save');

Route::get('/admin/doctor/list',[AdminController::Class,'view_doctor'])->Middleware('AUTH')->name('admin.doctor.view');

Route::get('/admin/patient/list',[AdminController::class,'view_patient'])->Middleware('AUTH')->name('admin.patient.view');

Route::get('/admin/remove/doctor/{id}',[AdminController::class,'delete_doc'])->Middleware('AUTH')->name('admin.doctor.delete');

Route::get('/admin/edit/doctor/{id}',[AdminController::class,'edit_doc'])->name('admin.doctor.edit');

Route::get('/admin/doctor/report',[AdminController::class,'report']);

Route::post('/admin/edit/doctor/save',[AdminController::class,'edit_doc_submit'])->Middleware('AUTH')->name('admin.doctor.edit.save');

Route::get('/admin/view/appointment/record',[AdminController::Class,'myappoint'])->Middleware('AUTH')->name('admin.view.appointment.list');

Route::get('/admin/appointment/update/stat/{id}',[AdminController::class,'update_stat'])->Middleware('AUTH')->name('admin.appointment.update');

Route::get('/admin/logout',[AdminController::Class,'logout'])->Middleware('AUTH')->name('admin.logout');






Route::get('/doctor/home',[DoctorController::class,'home'])->Middleware('DOCAUTH')->name('doctor.home');

Route::get('/doctor/view/myprofile',[DoctorController::Class,'myprofile'])->Middleware('DOCAUTH')->name('doctor.view.myprofile');

Route::get('/doctor/view/myappointment',[DoctorController::Class,'myappoint'])->Middleware('DOCAUTH')->name('doctor.view.myappointment');

Route::get('/doctor/appointment/update/stat/{id}',[DoctorController::class,'update_stat_doc'])->Middleware('DOCAUTH')->name('doctor.appointment.update');

Route::get('/doctor/logout',[DoctorController::Class,'logout'])->Middleware('DOCAUTH')->name('doctor.logout');




Route::get('/patient/registration',[PatientController::Class,'reg_patient'])->name('patient.reg');

Route::post('/patient/registration/save',[PatientController::Class,'reg_patient_submit'])->name('patient.reg.save');

Route::get('/patient/doctor/list',[PatientController::Class,'view_doctor'])->Middleware('PATAUTH')->name('patient.doctor.view');

Route::get('/patient/appointent/time/book/{id}',[PatientController::Class,'appointmentTime'])->Middleware('PATAUTH')->name('patient.appointment.time');

Route::get('/patient/home',[PatientController::class,'home'])->Middleware('PATAUTH')->name('patient.home');

Route::post('/patient/appointent/book/save',[PatientController::Class,'appointmentTimeSubmit'])->Middleware('PATAUTH')->name('patient.appointment.save');

Route::get('/patient/view/myprofile',[PatientController::Class,'myprofile'])->Middleware('PATAUTH')->name('patient.view.myprofile');

Route::get('/patient/view/myappointment',[PatientController::Class,'myappoint'])->Middleware('PATAUTH')->name('patient.view.myappointment');

Route::get('/patient/logout',[PatientController::Class,'logout'])->Middleware('PATAUTH')->name('patient.logout');





