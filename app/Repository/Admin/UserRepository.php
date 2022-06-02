<?php

namespace App\Repository\Admin;

use App\Models\Admin\Employer;
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

    public function userCompanyCreate(User $user,$request)
    {
            //owner registration
            $company = $user->company()->create([
                'name'=>$request->CompanyName,
                'email'=>$request->CompanyEmail,
                'web'=>$request->web,
                'city'=>$request->city,
                'address'=>$request->address,
                'contact_number'=>$request->ContactNumber,
                'contact_person'=>$user->id,
            ]);
            return $company;

    }

}
