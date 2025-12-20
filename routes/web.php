<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\VisitorController;
use App\Http\Middleware\EnsureModificationAuthorization;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('visitor');
    } else {
        return view('welcome');
    }
})->name('welcome');
Route::get('/dashboard', function () {
    return redirect('visitor');
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Officer
Route::middleware(['auth'])->controller(OfficerController::class)->prefix('officer')->name('officer.')
    ->group(function () {
        Route::get('/', 'list')->name('list');
        Route::get('/create', 'create')->name('create')->middleware(EnsureModificationAuthorization::class);
        Route::post('/store', 'store')->name('store');
        Route::post('/name_search', 'name_search')->name('name_search');
        Route::get('/{person}/edit', 'edit')->name('edit')->middleware(EnsureModificationAuthorization::class);;
        Route::put('/{person}/update', 'update')->name('update')->middleware(EnsureModificationAuthorization::class);;
    });

// Visitor
Route::middleware(['auth'])->controller(VisitorController::class)->prefix('visitor')->name('visitor.')
    ->group(function () {
        Route::get('/', 'list')->name('list');
        Route::get('/create', 'create')->name('create')->middleware(EnsureModificationAuthorization::class);;
        Route::post('/store', 'store')->name('store');
        Route::post('/phone_search', 'phone_search')->name('phone_search');
        Route::post('/name_search', 'name_search')->name('name_search');
        Route::post('/report', 'report')->name('report');
        Route::view('/report', 'visitor.report')->name('report');
        Route::get('/paged_report/{from}/{to}', 'paged_report')->name('paged_report');
    });
