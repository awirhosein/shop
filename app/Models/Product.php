<?php

namespace App\Models;

use App\Enums\ProductStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

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
     * Relations
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
