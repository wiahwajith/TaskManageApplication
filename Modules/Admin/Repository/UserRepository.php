<?php

namespace Modules\Admin\Providers;

use App\Models\User;


class UserRepository 
{
    public function AllUser()
    {
        return User::all();
    }
}

