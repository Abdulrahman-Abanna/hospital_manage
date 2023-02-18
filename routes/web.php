<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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



Route::get('/',[HomeController::class,'index']);

Route::get('/home',[HomeController::class,'redirect'])->middleware('auth','verified');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/add_doctor_view',[AdminController::class,'addview'])->name('add_doctor_view');


Route::post('/upload_doctor',[AdminController::class,'uploade']);

Route::post('/appointment',[HomeController::class,'appointment']);


Route::get('/myappointment',[HomeController::class,'myappointment']);

Route::get('/getdata',[HomeController::class,'getdata'])->name('getdata');

Route::post('/delete_appointment',[HomeController::class,'delete_appointment'])->name('delete_appointment');

Route::get('/show_appointment',[AdminController::class,'showappointment'])->name('show_appointment');

Route::get('/getshowappointmet',[AdminController::class,'getshowappointmet'])->name('getshowappointmet');


Route::get('/acceptappointment/{id}',[AdminController::class,'acceptappointment'])->name('acceptappointment');
Route::get('/cancelappointment/{id}',[AdminController::class,'cancelappointment'])->name('cancelappointment');

Route::get('/show_doctor',[AdminController::class,'showdoctors'])->name('show_doctor');

Route::get('/data_doctor',[AdminController::class,'getdatadoctor'])->name('getshowdoctor');


Route::get('/edit_doctor/{id}',[AdminController::class,'edit_doctor'])->name('edit_doctor');
Route::get('/delete_doctor/{id}',[AdminController::class,'deletedoctor'])->name('delete_doctor');

Route::post('/updata_doctor/{id}',[AdminController::class,'updatadoctor'])->name('updata_doctor');

Route::get('/send_email/{id}',[AdminController::class,'sendemail'])->name('send_email');

Route::post('/send_emailnotification/{id}',[AdminController::class,'sendemailnotification']);
