<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\TypeUser;
use App\Models\User;
use App\Models\Category;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user = is_array($this->user) ? $this->user : $this->user->toArray();
        $category = is_array($this->category) ? $this->category : $this->category->toArray();

        return [
            'user_id' => $user['id'] ?? null,
            'user_name' => $user['name'] ?? null,
            'category_id' => $category['id'] ?? null,
            'category_name' => $category['name'] ?? null,
        ];
    }
}
