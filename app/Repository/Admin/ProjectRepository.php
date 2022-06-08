<?php

namespace App\Repository\Admin;

use App\Models\Admin\Project;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ProjectResource;
use App\Models\ProjectStatus;

class ProjectRepository 
{

    public function createProject($request)
    {
        $user = Auth::User();
        $project = Project::create($request->all() +['company_id'=> $user->company_id ,'creator_id' => $user->id]);
        return $project;
    }

    public function allCompanyProjects()
    {
        $project = Project::all()->filter();
        return ProjectResource::collection($project);
    }

    public function find($id)
    {
        $project = Project::find($id);
        return $project;
    }

    public function allProjectStatus()
    {
        $status = ProjectStatus::all(['id','name']);

        return $status;
    }

    public function updateProject($request ,$id)
    {
        $project = Project::findOrFail($id);
        $project = $project->update($request->all());

        return $project;
    }
}
