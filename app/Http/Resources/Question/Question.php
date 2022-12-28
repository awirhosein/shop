<?php

namespace App\Http\Resources\Question;

use App\Http\Resources\User\User as UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Question extends JsonResource
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
            'created_at' => $this->created_at,
            'user' => new UserResource($this->user),
            'answers' => $this->when(!$this->parent_id, self::collection($this->answers()->approved()->get()))
        ];
    }
}
