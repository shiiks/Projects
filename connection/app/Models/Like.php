<?php

namespace Connection\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
	protected $table='likeable';

	public function likeable()
	{
		return $this->morphTo();
	}

	public function user()
	{
		return $this->belongsTo('Connection\Models\Status', 'user_id');
	}
}