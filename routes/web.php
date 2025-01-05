<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

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
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/admin', [AdminController::class, 'dashboar'])->name('dashboar');
Route::get('/admin', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin', [AdminController::class, 'login'])->name('admin.login');
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/admin/contact', [AdminController::class, 'showContacts'])->name('admin.contact');
    Route::delete('/contact/{id}', [AdminController::class, 'destroy'])->name('admin.deletecontact');
    Route::get('/admin/results', [AdminController::class, 'results'])->name('admin.results');
    Route::delete('/admin/results/{id}', [AdminController::class, 'deleteResult'])->name('admin.deleteresult');
    Route::get('/admin/countries', [AdminController::class, 'countries'])->name('admin.countries');
    Route::get('/admin/countries/create', [AdminController::class, 'createCountry'])->name('admin.countries.create');
    Route::post('/admin/countries', [AdminController::class, 'storeCountry'])->name('admin.countries.store');
    Route::get('/admin/countries/{id}/edit', [AdminController::class, 'editCountry'])->name('admin.countries.edit');
    Route::put('/admin/countries/{id}', [AdminController::class, 'updateCountry'])->name('admin.countries.update');
    Route::delete('/admin/countries/{id}', [AdminController::class, 'deleteCountry'])->name('admin.countries.destroy');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});
