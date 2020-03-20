<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;

class UserController extends Controller
{
	public function __construct(UserRepositoryInterface $repo)
    {
        $this->repo = $repo;
        // $this->middleware('auth:api');
    }

    public function get($id)
    {
    	return $this->repo()->get($id);
    }
}
