<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\UserController;
use  App\Http\Controllers\AdminController;
use  App\Http\Controllers\PatientController;
use  App\Http\Controllers\DoctorController;
use  App\Http\Middleware\AUTH;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// Auth routes
Route::post('/login', [UserController::class, 'loginSubmit']);
Route::put('/logout', [UserController::class, 'logout']);

Route::get('/admin/doctor/list',[AdminController::Class,'view_doctor'])->Middleware('AdminMiddleware');
Route::get('/admin/doctor/{id}', [AdminController::class, 'getSingleDoctor'])->Middleware('AdminMiddleware');

Route::get('/admin/patients/list',[AdminController::class,'view_patient'])->Middleware('AdminMiddleware');

Route::get('/admin/appointments/list',[AdminController::Class,'myappoint'])->Middleware('AdminMiddleware');

Route::put('/admin/changeStatus/{id}', [AdminController::class, 'update_stat'])->Middleware('AdminMiddleware');

Route::get('/admin/edit/doctor/{id}',[AdminController::class,'edit_doc'])->Middleware('AdminMiddleware');

Route::get('/admin/doctor/report/count', [AdminController::class, 'report'])->Middleware('AdminMiddleware');

Route::post('/admin/edit/doctor/save',[AdminController::class,'edit_doc_submit'])->Middleware('AdminMiddleware');

Route::delete('/admin/deletedoctor/{id}', [AdminController::class, 'delete_doc'])->Middleware('AdminMiddleware');

Route::post('/addDoctor', [AdminController::class, 'docregSubmit'])->Middleware('AdminMiddleware');




Route::get('/doctor/view/myappointment',[DoctorController::Class,'myappoint'])->Middleware('doctorauth');
Route::get('/doctor/view/myprofile',[DoctorController::Class,'myprofile'])->Middleware('doctorauth');
Route::put('/doctor/appointment/update/stat/{id}',[DoctorController::class,'update_stat_doc'])->Middleware('doctorauth');



Route::get('/patient/doctor/list',[PatientController::Class,'view_doctor'])->Middleware('PatientMiddleware');

Route::get('/patient/registration',[PatientController::Class,'reg_patient']);

Route::post('/patient/registration/save',[PatientController::Class,'reg_patient_submit']);

Route::get('/patient/view/myprofile',[PatientController::Class,'myprofile'])->Middleware('PatientMiddleware');

Route::get('/patient/appointment/time/book/{id}',[PatientController::Class,'appointmentTime'])->Middleware('PatientMiddleware');

Route::post('/patient/appointent/book/save',[PatientController::Class,'appointmentTimeSubmit'])->Middleware('PatientMiddleware');

Route::get('/patient/view/myappointment',[PatientController::Class,'myappoint'])->Middleware('PatientMiddleware');

Route::get('/logout', [UserController::class, 'logout']);