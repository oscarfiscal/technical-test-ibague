<?php

use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/employee', function () {
        return view('employee.index');
    })->name('dashboard');
    Route::resource('/employee', EmployeeController::class);
    Route::resource('/departament', DepartamentController::class);
});


