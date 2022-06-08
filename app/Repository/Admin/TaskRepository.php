<?php

namespace App\Repository\Admin;

use Carbon\Carbon;
use App\Models\Admin\Task;
use App\Models\Admin\Project;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\Admin\CompanyTaskResource;

class TaskRepository 
{

    public function store($request)
    {

        $startDate = null;
        if($request->task_status_id == 2){
            $startDate = Carbon::now()->format('Y-m-d');
        }
        $userId = Auth::user()->id;
        $task = Task::create(
            $request->all()+ 

            [
                'creator_id'=> $userId,
                'worker_task_start_date'=> $startDate,
            ]
        );

        return $task;
    }

    public function getCompanyTask($projectId)
    {
        $loggedUser =  Auth::user();

        $companyTask = Task::where('project_id', $projectId)
                            ->where(function($query) use($loggedUser) {
                                $query->where('assigner_id', $loggedUser->id)
                                ->orWhere('creator_id',$loggedUser->id);
                            })->get();
        return CompanyTaskResource::collection($companyTask);
    }

    public function taskStatusUpdate($request , $taskId)
    {
        $task = Task::find($taskId);
        $task->task_status_id = $request->state;
        $task->save();

        return $task;
    }

}
