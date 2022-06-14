<?php

namespace App\Models;

use App\Models\Admin\Company;
use App\Models\Admin\Employer;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'company_id',
        'is_working',
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
        return $this->belongsTo('App\Models\Admin\Employer', 'employees_id', 'id');
    }
    public function company()
    {
        return $this->hasOne('App\Models\Admin\Company','id','company_id');
    }

    //attribute
    public function getRoleNameAttribute()
    {
        return $this->getRoleNames()->first() ?? null;
    }

    public function scopeFilter($query)
    {
        $companyId = Auth::user()->company_id ??'';
        return $this->query->where('company_id', $companyId);
    }



}
