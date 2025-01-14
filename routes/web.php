<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', \App\Livewire\Pages\HomePage::class);
Route::get('/items/add', \App\Livewire\Items\AddItem::class)->name("items.add");
Route::get('/items', \App\Livewire\Items\ListItems::class)->name("items.list");
