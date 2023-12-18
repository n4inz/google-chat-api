<?php

namespace App\Http\Resources;

use App\Http\Resources\User as ResourcesUser;
use App\Models\TypeUser;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class Task extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user = User::select('id', 'name' , 'spaces')->with('type_users') ->whereHas('type_users', function ($queryJob) {
            $queryJob->where('categorie_id', $this->categorie_id);
        })->get();
        return [
            'id' => $this->id,
            'ticket' => $this->ticket,
            'task_name' => $this->task_name,
            'category_name' => $this->category_name,
            'priority' => $this->priority,
            'status' => $this->status,
            'user_create' => new ResourcesUser($this->user),
            'user' => $user ? ResourcesUser::collection($user) : null
        ];
    }
}
