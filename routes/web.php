<?php

use App\Livewire\Link;
use App\Models\Link as LinkModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', Link::class);

Route::get('/{shortCode}', function ($shortCode)
{
	$link = LinkModel
		::where('short_code', $shortCode)
		->where('is_active', true)
		->firstOrFail();
	
	LinkModel::where('id', $link->id)->update([
		'clicks' => DB::raw('clicks + 1'),
		'last_clicked_at' => now(),
	]);
	
	return redirect($link->original_url);
});

Route::view('dashboard', 'dashboard')
	->middleware(['auth', 'verified'])
	->name('dashboard');

Route::view('profile', 'profile')
	->middleware(['auth'])
	->name('profile');

require __DIR__.'/auth.php';
