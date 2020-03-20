<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
	protected $table = 'report';
    protected $fillable = [
        'product_id', 'ammount', 'purchased'
    ];

    public function product()
    {
    	return $this->belongsTo('App\Models\Product');
    }
}
