<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'employees_id'
    ];
    //relation
    public function user()
    {
        return $this->hasOne(User::class , 'id' , 'employees_id');
    }

    //model function

    public function generateUniqueCode()
    {
        do {
            $code = random_int(100000, 999999);
        } while (self::where("emp_id", "=", $code)->first());
  
        return $code;
    }
}
