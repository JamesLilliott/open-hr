<?php

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
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('employee')->group(function () {
        Route::view('/create', 'employee.create')->name('employee.create');
        Route::view('/', 'employee.index')->name('employee.index');
        Route::view('/update/{employee}', 'employee.update', ['employee' => 'employee'])->name('employee.update');
    });

    Route::prefix('team')->group(function () {
        Route::view('/create', 'team.create')->name('team.create');
        Route::view('/', 'team.index')->name('team.index');
        Route::view('/update/{team}', 'team.update', ['team' => 'team'])->name('team.update');
    });
});
