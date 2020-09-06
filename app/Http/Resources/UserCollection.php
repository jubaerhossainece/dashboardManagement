<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($user){
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'type' => $user->type,
                    'bio' => $user->bio,
                    'created_at' => $user->created_at->format('M jS, Y - H:i:s'),
                    'updated_at' => $user->updated_at->format('d m y - h:i:s')
                ];
            })
        ];
    }
}
