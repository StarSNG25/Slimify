<?php

use App\Http\Controllers\LinkController;
use App\Livewire\Link;
use Illuminate\Support\Facades\Route;

Route::get('/', Link::class)
	->middleware(['guest'])
	->name('home');

Route::view('dashboard', 'dashboard')
	->middleware(['auth', 'verified'])
	->name('dashboard');

Route::view('profile', 'profile')
	->middleware(['auth'])
	->name('profile');

require __DIR__.'/auth.php';

Route::get('/{shortCode}', [LinkController::class, 'redirect']);
