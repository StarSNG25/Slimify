<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
	protected $fillable = [
		'link_id',
		'device_type',
	];
	
	protected $casts = [
		'link_id' => 'integer',
	];
	
	public function link()
	{
		return $this->belongsTo(Link::class);
	}
}
