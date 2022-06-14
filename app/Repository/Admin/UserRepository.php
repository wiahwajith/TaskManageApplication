<?php

namespace App\Repository\Admin;

use App\Http\Resources\Admin\UserResource;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin\Employer;
use App\Models\Atentendance;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;


class UserRepository 
{

    public function AllCompanyUsers()
    {
        $users = Employer::all()->filter();
        return  UserResource::collection($users)->all();
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
            
            // user company assign
            $user->company_id = $company->id;
            $user->save();

            return $company;

    }
    
    public function addEmployer($request)
    {
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
                
                //send verification email
        
                $notification =  event(new Registered($user));
        
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
                    'company_id'=> $companyId,
                ]);

                if($user || $userRole || $account || $notification ){
                    return true;
                } return false;
    }

    public function deleteEmployer($id)
    {
        $delete = Employer::find($id)->user()->delete();
        return $delete;
    }

    public function userCompany()
    {
        return Auth::user()->company;
    }

    public function markAttendance($request)
    {
        $employer = User::find($request->user_id);

        if($request->type == "start"){
            $employer->is_working = 1 ;
            $employer->save();
        }else{
            $employer->is_working = 0 ;
            $employer->save();
        }

        $attendance = Atentendance::create($request->all());

        return $attendance;
    }
}
