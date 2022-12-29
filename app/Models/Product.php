<?php

namespace App\Models;

use App\Enums\ProductStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use App\Models\Traits\{ProductScopes, ProductRelations};

class Product extends Model
{
    use HasFactory, SoftDeletes, ProductRelations, ProductScopes;

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
}
