<?php

use App\Http\Controllers\Backend\BukuController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\Backend\KategoriController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\frontend\homeController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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
})->name('login');
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

Route::middleware('auth')->group(function() {
    // My Profile
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');

    // Settings
    Route::get('/settings', [UserController::class, 'settings'])->name('settings');

    // Update profile (to update the profile details)
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');

    // Update settings (to update the settings like password)
    Route::put('/settings/update', [UserController::class, 'updateSettings'])->name('settings.update');


    Route::get('reservations', [ReservationController::class, 'index'])->name('reservations.index');

    // Show form to create a new reservation
    Route::get('reservations/create', [ReservationController::class, 'create'])->name('reservations.create');

    // Store a new reservation (post request)
    Route::post('reservations', [ReservationController::class, 'store'])->name('reservations.store');

    // Show the form to edit a reservation
    Route::get('reservations/{reservation}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');

    // Update a reservation
    Route::put('reservations/{reservation}', [ReservationController::class, 'update'])->name('reservations.update');

    // Delete a reservation
    Route::delete('reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
});
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
