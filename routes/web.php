<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

require __DIR__.'/auth.php';
