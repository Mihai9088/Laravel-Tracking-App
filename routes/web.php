<?php

use App\Http\Controllers\TimeSheetController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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




Route::get('/', [UserController::class, 'index'])->name('/');

Route::get('/register', [UserController::class, 'create']);

Route::post('/users', [UserController::class, 'store']);

Route::post('/logout', [UserController::class, 'logout']);

Route::get('/login', [UserController::class, 'login']);

Route::post('/users/auth', [UserController::class, 'auth']);



Route::get('/timesheets', [TimeSheetController::class, 'index']);
Route::get('/timesheets/create', [TimeSheetController::class, 'create']);
Route::post('/timesheets', [TimeSheetController::class, 'store'])->name('timesheets.store');
Route::get('/timesheets/{timesheet}/edit', [TimeSheetController::class, 'edit'])->name('timesheets.edit');
