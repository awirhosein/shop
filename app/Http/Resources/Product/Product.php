<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Color\Color;
use App\Http\Resources\Attribute\Attribute;
use App\Http\Resources\Category\CategoryShort;
use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
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
            'image' => $this->image,
            'content' => $this->content,
            'created_at' => $this->created_at,
            'category' => new CategoryShort($this->category),
            'colors' => Color::collection($this->colors),
            'attributes' => Attribute::collection($this->attributes),
            'related_products' => ProductShort::collection($this->relatedProducts()->get())
        ];
    }
}
