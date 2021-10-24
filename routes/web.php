<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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


Route::get('/', function () {
    return view('home');
});




Route::get('/home', [HomeController::class, 'index']);
Route::get('/users', [AdminController::class, 'user']);
Route::get('/foodmenu', [AdminController::class, 'foodmenu']);
Route::get('/viewchef', [AdminController::class, 'viewchef']);
Route::get('/updatechef/{id}', [AdminController::class, 'updatechef']);



Route::post('/uploadfood', [AdminController::class, 'upload']);
Route::post('/uploadreservation', [HomeController::class, 'reserve']);
Route::post('/uploadchef', [AdminController::class, 'chef']);

Route::get('/redirects', [HomeController::class, 'redirects']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
