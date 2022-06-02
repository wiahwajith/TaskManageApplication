<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'web',
        'city',
        'address',
        'contact_number',
        'contact_person',
    ];
    protected $table = 'company';


    public function users()
    {
        return $this->hasMany('App\Models\User','company_id','id');
    }
    public function owner()
    {
        return $this->hasOne('App\Models\User','id','contact_person');
    }
}
