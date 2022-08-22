<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', [JobController::class , 'index'])->name('index');


Route::prefix('job/')->middleware('auth')->group(function(){
    Route::get('create', [JobController::class , 'create'])->name('create');
    Route::post('job', [JobController::class , 'store'])->name('store');
    Route::get('{job}/edit', [JobController::class , 'edit'])->name('edit');
    Route::post('{job}', [JobController::class , 'update'])->name('update');
    Route::post('{job}/destroy', [JobController::class , 'destroy'])->name('destroy');
    
});
Route::get('/details/{id}', [JobController::class , 'show'])->name('show');
// Route::post('/manage-jobs', [UserController::class,'manage'])->name('manage');

Route::get('/register', [UserController::class,'create'])->name('register');
Route::post('/register', [UserController::class,'store'])->name('register_user');
Route::get('/users/login',[UserController::class,'login'])->name('login');
Route::post('/users/authenticate',[UserController::class,'authenticate'])->name('authenticate');
Route::get('/logout', [UserController::class,'logout'])->name('logout');
