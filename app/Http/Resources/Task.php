<?php

namespace App\Http\Resources;

use App\Models\TypeUser;
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
        TypeUser::where('categorie_id' , $this->categorie_id)->with('user')->get();
        return [
            'ticket' => $this->ticket,
            'task_name' => $this->task_name,
            'category_name' => $this->category_name,
            'priority' => $this->priority
        ];
    }
}
