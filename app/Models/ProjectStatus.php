<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectStatus extends Model
{
    use HasFactory;
    
    protected $table ='project_status';

    protected $fillable = [
        'name',
        'code',
        'value',
        'description',
    ];

    public function project()
    {
        return $this->belongsTo('App\Models\Admin\project');
    }
}
