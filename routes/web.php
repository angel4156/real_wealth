<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Did_knowController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactUSController;

/*
|--------------------------------------------------------------------------
| Web Routes
|------------------------------------------------------------000000000000000000--------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



//route login
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'process']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// Define your login and logout routes
// Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [UserController::class, 'login']);
// Route::post('/logout', [UserController::class, 'logout'])->name('logout');

//Front page
Route::get('/main', [MainController::class, 'index'])->middleware('auth');

// route dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('/', [MainController::class, 'index']);

//route barang
Route::resource('/barang', BarangController::class)->middleware('auth');

//route did_know

Route::resource('/did_know', Did_knowController::class)->middleware('auth');

//route stock

Route::resource('/stock', StockController::class)->middleware('auth');

//route promotion

Route::resource('/promotion', PromotionController::class)->middleware('auth');

//route about

Route::resource('/about', AboutController::class)->middleware('auth');
// Route::post('/about_add', [AboutController::class, 'image']);


//route stock for ajax request
Route::post('/stock_test', [StockController::class, 'test']);




