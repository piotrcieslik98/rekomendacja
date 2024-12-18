<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [Controller::class, 'showRecommendationForm'])->name('recommendation.form');
Route::post('/recomend', [Controller::class, 'recommendCountry'])->name('recommendation.process');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('postsignup');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('postlogin');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/admin', [AdminController::class, 'dashboar'])->name('dashboar');
Route::get('/admin', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin', [AdminController::class, 'login'])->name('admin.login');
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/admin/contact', [AdminController::class, 'showContacts'])->name('admin.contact');
    Route::delete('/contact/{id}', [AdminController::class, 'destroy'])->name('admin.deletecontact');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});
