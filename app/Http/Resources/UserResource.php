<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'type' => $this->type,
            'bio' => $this->bio,
            'created_at' => $this->created_at->format('d M Y - H:i:s'),
            'updated_at' => $this->updated_at->format('d m y - h:i:s')
        ];        
    }
}
