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

Route::get('/', [\App\Http\Controllers\ProfileController::class,'index']);
Route::delete('delete/employe/{id}', [\App\Http\Controllers\ProfileController::class,'destroy']);
Route::get('edit/employe/{id}', [\App\Http\Controllers\ProfileController::class,'edit']);
Route::post('update/employe/{id}', [\App\Http\Controllers\ProfileController::class,'update'])->name('update.employe');
Route::get('/employes', [\App\Http\Controllers\ProfileController::class,'employes']);
Route::get('fetchEmployes', [\App\Http\Controllers\ProfileController::class,'fetchEmployes'])->name('fetchEmployes');
Route::get('allEmployes', [\App\Http\Controllers\ProfileController::class,'allEmployes'])->name('allEmployes');
Route::post('store', [\App\Http\Controllers\ProfileController::class,'store'])->name('store');
Route::post('store/courses', [\App\Http\Controllers\CoursesController::class,'store'])->name('store.courses');
Route::post('store/certificates', [\App\Http\Controllers\CertificatesController::class,'store'])->name('store.certificates');
Route::post('store/experiences', [\App\Http\Controllers\ExperiencesController::class,'store'])->name('store.experiences');
Route::post('store/employes', [\App\Http\Controllers\EmployesDataController::class,'store'])->name('store.employes');


