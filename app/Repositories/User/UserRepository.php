<?php

declare(strict_types=1);

namespace App\Repositories\User;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\User;


class UserRepository implements UserRepositoryInterface
{

    public function get($id)
    {
     	return User::with('reportViews')->find($id);
    }

}
