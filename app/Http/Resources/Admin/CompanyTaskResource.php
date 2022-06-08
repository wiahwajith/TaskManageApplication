<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyTaskResource extends JsonResource
{
    public static $wrap = null;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {


        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,	
            'task_start_date' => $this->task_start_date,	
            'task_end_date' => $this->task_end_date	,
            'worker_task_start_date' => $this->worker_task_start_date,	
            'worker_task_end_date' => $this->worker_task_end_date,	
            'status' => $this->status->toArray(),	
            'creator' => $this->creator->name,	
            'assigner' => $this->assigner->name,
            'urgent' => $this->urgent,
        ];
    }
}
