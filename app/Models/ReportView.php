<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportView extends Model
{
    protected $fillable = [
        'product_id', 'total_views', 'user_id'
    ];

    public function product()
    {
    	return $this->belongsTo('App\Models\Product');
    }
}
