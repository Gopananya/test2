<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Report;
use App\Models\ReportView;

class Test extends Controller
{
    public function index()
    {
    	dd(ReportView::with('product')->find(2));
    }
}
