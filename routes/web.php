<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TimeSheetController;


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




Route::middleware(['guest'])->group(function () {
    Route::get('/login', [UserController::class, 'login'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/timesheets', [TimeSheetController::class, 'index']);
    Route::get('/timesheets/create', [TimeSheetController::class, 'create']);
    Route::post('/timesheets', [TimeSheetController::class, 'store'])->name('timesheets.store');
    Route::get('/timesheets/{timesheet}/edit', [TimeSheetController::class, 'edit'])->name('timesheets.edit');
    Route::put('/timesheets/{timesheet}/update', [TimeSheetController::class, 'update'])->name('timesheets.update');
    Route::delete('/timesheets/{timesheet}/destroy', [TimeSheetController::class, 'destroy'])->name('timesheets.destroy');
    Route::get('/timesheets/filter', [TimeSheetController::class, 'filter'])->name('timesheets.filter');
    Route::get('/timesheets/export-csv', [TimeSheetController::class, 'exportToCsv'])->name('timesheets.export.csv');
});
Route::get('/register/verification', [MailController::class, 'sendMail']);
