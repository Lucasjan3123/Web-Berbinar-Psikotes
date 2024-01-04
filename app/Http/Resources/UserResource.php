<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'role_id' => $this->role_id,
            'user_id' => $this->user_id,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
            'profile_picture' => $this->profile_picture,
        ];
    }
}
