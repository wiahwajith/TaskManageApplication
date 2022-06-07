<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table ='task';
    protected $fillable = [
        'title',
        'description',	
        'task_start_date',	
        'task_end_date'	,
        'worker_task_start_date',	
        'worker_task_end_date',	
        'project_id',	
        'task_status_id',	
        'creator_id',	
        'assigner_id',
    ];

    public function creator()
    {
        return $this->hasOne('App\Models\User','id','creator_id');
    }
    public function assigner()
    {
        return $this->hasOne('App\Models\User','id','assigner_id');
    }
    public function status()
    {
        return $this->hasOne('App\Models\TaskStatus','id','task_status_id');
    }
    public function company()
    {
        return $this->hasOne('App\Models\Company','id','company_id');
    }


}
