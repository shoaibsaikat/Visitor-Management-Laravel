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
Route::get('/officer', [OfficerController::class, 'list'])->name('officer.list');
Route::get('/officer/create', [OfficerController::class, 'create'])->name('officer.create');
Route::post('/officer/store', [OfficerController::class, 'store'])->name('officer.store');
Route::get('/officer/{person}/edit', [OfficerController::class, 'edit'])->name('officer.edit');
Route::put('/officer/{person}/update', [OfficerController::class, 'update'])->name('officer.update');

// Visitor
Route::get('/visitor', [VisitorController::class, 'list'])->name('visitor.list');
Route::get('/visitor/create', [VisitorController::class, 'create'])->name('visitor.create');
Route::post('/visitor/store', [VisitorController::class, 'store'])->name('visitor.store');
Route::post('/visitor/search', [VisitorController::class, 'search'])->name('visitor.search');
Route::get('/visitor/report', function() {
    return view('visitor.report');
})->name('visitor.report');
Route::post('/visitor/report', [VisitorController::class, 'report'])->name('visitor.report');
Route::get('/visitor/paged_report/{from}/{to}', [VisitorController::class, 'paged_report'])->name('visitor.paged_report');