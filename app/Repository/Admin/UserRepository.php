<?php

namespace App\Repository\Admin;

use App\Models\User;
use Spatie\Permission\Models\Role;


class UserRepository 
{
    public function AllUser()
    {
        return User::all();
    }

    public function AllUserRoles()
    {
        return Role::all()->only('id','name');
    }

}
