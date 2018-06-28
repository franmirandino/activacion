<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivationToken extends Model
{
	protected $fillable = ['user_id', 'token', 'active'];
    protected $primaryKey = 'token';
    protected $dates = ['created_at'];
    public $incrementing = false;
    public $timestamps = false;


    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
