<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Category\Category as CategoryResource;

class CategoryParent extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'children' => CategoryResource::collection($this->children)
        ];
    }
}
