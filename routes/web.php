<?php

use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('home');
    }
    return view('welcome');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('print-id/{student}', [PrintController::class, 'printId'])->name('print-id');
Route::get('print-id-bulk', [PrintController::class, 'printIdBulk'])->name('print-id-bulk');
Route::post('store', [StudentController::class, 'store'])->name('store');
Route::put('update/{student}', [StudentController::class, 'update'])->name('update');
Route::delete('delete/{student}', [StudentController::class, 'destroy'])->name('delete');
Route::post('store-bulk', [StudentController::class, 'storeBulk'])->name('store-bulk');
