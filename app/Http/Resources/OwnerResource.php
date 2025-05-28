<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OwnerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name'=>$this->name,
            'surname'=>$this->surname,
            'phone'=>$this->phone,
            'email'=>$this->email,
            'address'=>$this->address,
            'user_id'=>$this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'cars' => CarResource::collection($this->whenLoaded('cars')),
        ];
    }
}
