<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $table = 'project';

    protected $fillable =[

        'title',
        'description',
        'assigner_id',
        'company_id',
        'creator_id',
        'customer_id',
        'project_status_id',
        'progress',
        'project_start_date',
        'project_end_date',
    ];
    //relation
    public function status()
    {
        return $this->hasOne('App\Models\ProjectStatus','id','project_status_id');
    }
    public function assigner()
    {
        return $this->hasOne('App\Models\User','id','assigner_id');
    }
    public function creator()
    {
        return $this->hasOne('App\Models\User','id','creator_id');
    }
    public function customer()
    {
        return $this->hasOne('App\Models\User','id','customer_id');
    }
    public function scopeFilter($query)
    {
        $companyId = Auth::user()->company_id ??'';
        return $this->query->where('company_id', $companyId);
    }
    public function getStateAttribute()
    {
        return $this->status->name ?? null;
    }

}
