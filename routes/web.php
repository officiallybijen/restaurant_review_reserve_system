<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\MenuImageController;


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

Route::get('/',function(){
    return redirect()->route('index');
});
Route::get('/home',[HomeController::class,'index'])->name('index');

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

    //adding multiple images
    Route::get('/menu/{id}/images/add',[MenuImageController::class,'create'])->name('menu.images');
    Route::post('/menu/{id}/images/add',[MenuImageController::class,'store'])->name('menu.images.store');

    Route::get('/dashboard',[DashboardController::class,'home'])->name('dashboard');
    Route::get('/dashboard/reservation/view',[DashboardController::class,'view'])->name('reservation.view');
    Route::get('/dashboard/reservation/delete/{id}',[ReserveController::class,'destroy'])->name('reservation.delete');

    
    Route::get('/dashboard/table',[TableController::class,'index'])->name('dashboard.table');
    Route::get('/dashboard/table/add',[TableController::class,'create'])->name('dashboard.table.add');
    Route::post('/dashboard/table/add',[TableController::class,'store'])->name('dashboard.table.store');
    Route::get('/dashboard/table/delete/{id}',[TableController::class,'destroy'])->name('dashboard.table.delete');


});
//needs to be cleaned up->>
Route::get('/menu/{id}/review',[ReviewController::class,'index'])->name('review');
Route::post('/menu/review/store/{menu_id}',[ReviewController::class,'store'])->name('review.store');

Route::get('/reserve',[ReserveController::class,'index'])->name('reserve');
Route::post('/reserve/store',[ReserveController::class,'store'])->name('reserve.store');
Route::get('/reserve/store/confirmed',[ReserveController::class,'confirmedReserve'])->name('reserve.store.confirmed');


