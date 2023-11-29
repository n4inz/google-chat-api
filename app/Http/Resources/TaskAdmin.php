<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as ResourcesUser;

class TaskAdmin extends JsonResource
{
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
            'ticket' => $this->ticket,
            'task_name' => $this->task_name,
            'category_name' => $this->category_name,
            'priority' => $this->priority,
            'status' => $this->status,
            'user_create' => new ResourcesUser($this->user),
            'created_at' => $this->created_at
        ];
    }
}
