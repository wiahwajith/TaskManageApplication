<?php

namespace App\Repository\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin\Employer;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserRepository 
{
    public function AllUser()
    {
        return User::all();
    }

    public function AllUserRoles()
    {
        return Role::all(['id','name']);
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
    
    public function addEmployer($request)
    {
                // dd($request);
                $companyId = Auth::user()->company_id;
                $empId = Employer::generateUniqueCode();
                $dob = Carbon::parse($request->DOB)->format('Y-m-d');
                $joinDate = Carbon::parse($request->join_date)->format('Y-m-d');
                $tempPassword = Hash::make('password');
                //create user authentiaction
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $tempPassword,
                    'company_id' => $companyId,
                ]);
                //assign user role
        
                $userRole = $user->assignRole($request->role);
        
                //update user profile
                $account = Employer::create([
                    'first_name'=> $request->first_name,
                    'last_name'=> $request->last_name,
                    'email'=> $request->email,
                    'web'=> $request->web,
                    'city'=> $request->city,
                    'NIC'=> $request->NIC,
                    'emp_id'=> $empId,
                    'DOB'=> $dob,
                    'join_date'=> $joinDate,
                    'designation'=> $request->designation,
                    'description'=> $request->description,
                    'address'=> $request->address,
                    'mobile_number'=> $request->mobile_number,
                    'employees_id'=> $user->id,
                ]);

                if($user || $userRole || $account){
                    return true;
                } return false;
    }
}
