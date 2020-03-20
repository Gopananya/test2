<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    
    public function __construct(ProductRepositoryInterface $repo)
    {
        $this->repo = $repo;
        // $this->middleware('auth:api');
    }

    public function getByDate($date)
    {
        return $this->repo->getByDate($date);
    } 

    public function percentage()
    {
        return $this->repo->percentage();
    } 

    
    public function index()
    {
        return $this->repo->all();
    }

    
    public function store(ProductRequest $request)
    {
        return $this->repo->add($request->all());
    }

    
    public function edit($id)
    {
        return $this->repo->getById($id);
    }

    public function update(ProductRequest $request, $id)
    {
        return $this->repo->update($request->all(), $id);
    }

    
    public function destroy($id)
    {
        return $this->repo->del($id);
    }
}
