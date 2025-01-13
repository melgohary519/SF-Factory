<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', \App\Livewire\Pages\HomePage::class);
Route::get('/items', \App\Livewire\Pages\Items::class)->name("items");
