<?php

namespace App\Models\Traits;

use App\Enums\ProductStatus;

trait ProductScopes
{
    public function scopePublished($query)
    {
        return $query->where('status', ProductStatus::PUBLISHED);
    }

    public function scopeRelatedProducts($query, $count = 8, $randomOrder = null)
    {
        $query = $query->where('category_id', $this->category_id)->where('id', '!=', $this->id);

        if ($randomOrder) {
            $query->inRandomOrder();
        }

        return $query->take($count);
    }
}
