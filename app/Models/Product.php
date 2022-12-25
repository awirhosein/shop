<?php

namespace App\Models;

use App\Enums\ProductStatus;
use App\Models\Traits\ProductRelations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Product extends Model
{
    use HasFactory, SoftDeletes, ProductRelations;

    public const STATUS_TYPES = [
        ProductStatus::DRAFT,
        ProductStatus::PUBLISHED,
        ProductStatus::ARCHIVED,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'image',
        'content',
        'category_id',
        'status',
    ];

    /**
     * Scope
     */
    public function scopePublished($query)
    {
        return $query->where('status', ProductStatus::PUBLISHED);
    }
}
