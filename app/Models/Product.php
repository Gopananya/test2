<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Events\ProductCreated;

class Product extends Model
{
    protected $fillable = [
        'title'
    ];
    protected $dispatchesEvents = [
        'created' => ProductCreated::class
    ];
    public $timestamps = false;
    public function report()
    {
    	return $this->hasMany('App\Models\Report', 'product_id', 'id');
    }
    public function reportView()
    {
    	return $this->hasMany('App\Models\ReportView', 'product_id', 'id');
    }
}
