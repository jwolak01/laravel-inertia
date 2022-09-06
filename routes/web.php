<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

// Assignments
Route::get('/assignments', [AssignmentController::class, 'index'])->name('assignments');
Route::get('/assignments/create', [AssignmentController::class, 'create'])->name('assignments.create');
Route::post('/assignments', [AssignmentController::class, 'store'])->name('assignments.store');
Route::put('/assignments/{assignment}', [AssignmentController::class, 'update'])->name('assignments.update');
Route::delete('/assignments/{assignment}', [AssignmentController::class, 'destroy'])->name('assignments.destroy');
