<?php

namespace App\Http\Resources\Comment;

use App\Http\Resources\User\User as UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Comment extends JsonResource
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
            'text' => $this->text,
            'user' => new UserResource($this->user),
            'created_at' => $this->created_at,
        ];
    }
}
