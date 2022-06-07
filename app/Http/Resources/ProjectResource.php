<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'creator' => $this->creator->name,   
            'assigner' => $this->assigner->name,    
            'customer' => $this->customer->name,   
            'project_status_id' => $this->project_status_id,   
            'progress' => $this->progress,    
            'project_start_date' => $this->project_start_date,    
            'project_end_date' => $this->project_end_date,  
            'created_at' => $this->created_at,    
            'updated_at' => $this->updated_at,     
            'company_id' => $this->company_id,
            'status' => $this->state,
        ];
    }
}
