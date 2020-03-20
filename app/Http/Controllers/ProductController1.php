<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductController extends Controller
{
    public function __construct(ProductRepositoryInterface $repo)
    {
        $this->repo = $repo;
        // $this->middleware('auth:api');
    }

    public function get($date)
    {
    	return $this->repo->getByDate($date);
    } 

    public function percentage()
    {
    	return $this->repo->percentage();
    } 
}
