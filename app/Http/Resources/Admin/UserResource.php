<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
        $role = $this->user->roleName;
        return [
            'id' => $this->id,   
            'full_name' => $this->first_name.' '.$this->last_name,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'web' => $this->web,  
            'city' => $this->city,       
            'NIC' => $this->NIC,
            'emp_id'=> $this->emp_id,
            'DOB' => $this->DOB,
            'join_date' => $this->join_date,     
            'designation' => $this->designation,  
            'description' => $this->description,   
            'address' => $this->address,
            'mobile_number' => $this->mobile_number,
            'role' =>$role,
            'tag' => [$role],
        ];
    }
}
