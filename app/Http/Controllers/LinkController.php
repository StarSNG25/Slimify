<?php

namespace App\Http\Controllers;

use App\Models\Click;
use App\Models\Link;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Facades\Agent;

class LinkController extends Controller
{
    public function redirect(string $shortCode): RedirectResponse
	{
		$link = Link
			::where('short_code', $shortCode)
			->where('is_active', true)
			->firstOrFail();
		
		Link::where('id', $link->id)->update([
			'clicks' => DB::raw('clicks + 1'),
			'last_clicked_at' => now(),
		]);
		
		Click::create([
			'link_id' => $link->id,
			'device_type' => Agent::deviceType(),
		]);
		
		return redirect($link->original_url);
	}
}
