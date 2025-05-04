<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, $shortCode)
 */
class Link extends Model
{
	use SoftDeletes;
	
	protected $fillable = [
		'user_id',
		'short_code',
		'original_url',
		'clicks',
		'last_clicked_at',
		'is_active',
		'is_deleted',
	];
	
	protected $casts = [
		'user_id'        => 'integer',
		'clicks'         => 'integer',
		'last_clicked_at'=> 'datetime',
		'is_active'      => 'boolean',
		'is_deleted'     => 'boolean',
		'deleted_at'     => 'datetime',
	];
	
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
