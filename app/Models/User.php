<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Entities\Company;
use Modules\Admin\Entities\Employer;

class User extends Authenticatable implements MustVerifyEmail 
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //relation
    public function employer()
    {
        return $this->belongsTo(Employer::class, 'employees_id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class,'id','company_id');
    }

    public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = Hash::make($password);
    }
    public function getRoleNameAttribute()
    {
        return $this->getRoleNames()->first() ?? null;
    }
}
