<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BukuController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\Backend\KategoriController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\frontend\homeController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/', [homeController::class, 'index']);
Route::get('/library', [homeController::class, 'library']);

// Route::get('dashboard', function () {
//     return view('backend/dashboard');
// });
// Route::get('/kategori', function () {
//     return view('backend/kategori');
// });


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/user', UserController::class);
    Route::resource('/buku', BukuController::class);
    Route::resource('/kategori', KategoriController::class)->only([
        'index', 'store', 'update', 'destroy'
    ]);
});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
