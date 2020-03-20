<?php

declare(strict_types=1);

namespace App\Repositories\Product;

use Illuminate\Http\Request;

interface ProductRepositoryInterface
{
    public function getByDate($date);
    public function percentage();
    public function all();
    public function add($data);
    public function getById($id);
    public function update($request, $id);



}
