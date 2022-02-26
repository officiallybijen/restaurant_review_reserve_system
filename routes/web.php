<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;

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

Route::get('/',[HomeController::class,'index'])->name('index');

Route::get('/register',[UserController::class,'registerView'])->name('register');
Route::post('/register',[UserController::class,'register'])->name('register.store');

Route::get('/login',[UserController::class,'loginView'])->name('login');
Route::post('/login',[UserController::class,'login'])->name('login.store');

Route::get('/logout',[UserController::class,'logout'])->name('logout');


Route::get('/menu',[MenuController::class,'index'])->name('menu');


Route::middleware(['auth','role_admin'])->group(function () {
    Route::get('/menu/add',[MenuController::class,'create'])->name('menu.add');
    Route::post('/menu/add',[MenuController::class,'store'])->name('menu.store');

    Route::get('/menu/edit/{id}',[MenuController::class,'edit'])->name('menu.edit');
    Route::post('/menu/update/{id}',[MenuController::class,'update'])->name('menu.update');

    Route::get('/menu/delete/{id}',[MenuController::class,'destroy'])->name('menu.delete');

});
