<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Officer
Route::get('/officer', [OfficerController::class, 'list'])->name('officer.list')->middleware('auth');
Route::get('/officer/create', [OfficerController::class, 'create'])->name('officer.create')->middleware('auth');
Route::post('/officer/store', [OfficerController::class, 'store'])->name('officer.store')->middleware('auth');
Route::post('/officer/name_search', [OfficerController::class, 'name_search'])->name('officer.name_search')->middleware('auth');
Route::get('/officer/{person}/edit', [OfficerController::class, 'edit'])->name('officer.edit')->middleware('auth');
Route::put('/officer/{person}/update', [OfficerController::class, 'update'])->name('officer.update')->middleware('auth');

// Visitor
Route::get('/visitor', [VisitorController::class, 'list'])->name('visitor.list')->middleware('auth');
Route::get('/visitor/create', [VisitorController::class, 'create'])->name('visitor.create')->middleware('auth');
Route::post('/visitor/store', [VisitorController::class, 'store'])->name('visitor.store')->middleware('auth');
Route::post('/visitor/phone_search', [VisitorController::class, 'phone_search'])->name('visitor.phone_search')->middleware('auth');
Route::post('/visitor/name_search', [VisitorController::class, 'name_search'])->name('visitor.name_search')->middleware('auth');
Route::get('/visitor/report', function() {
    return view('visitor.report');
})->name('visitor.report')->middleware('auth');
Route::post('/visitor/report', [VisitorController::class, 'report'])->name('visitor.report')->middleware('auth');
Route::get('/visitor/paged_report/{from}/{to}', [VisitorController::class, 'paged_report'])->name('visitor.paged_report')->middleware('auth');