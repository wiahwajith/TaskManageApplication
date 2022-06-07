<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employer extends Model
{
    use HasFactory;

    protected $table ="employees";

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'web',
        'city',
        'NIC',
        'emp_id',
        'DOB',
        'join_date',
        'designation',
        'description',
        'address',
        'mobile_number',
        'employees_id',
        'company_id',
        'rate'
    ];
    //relation
    public function user()
    {
        return $this->hasOne('App\Models\User' , 'id' , 'employees_id');
    }

    //model function

    public function generateUniqueCode()
    {
        do {
            $code = random_int(100000, 999999);
        } while (self::where("emp_id", "=", $code)->first());
  
        return $code;
    }
    public function scopeFilter($query)
    {
        $companyId = Auth::user()->company_id ??'';
        return $this->query->where('company_id', $companyId);
    }

}
