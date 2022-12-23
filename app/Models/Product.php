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
     * Scope
     */
    public function scopePublished($query) 
    {
        return $query->where('status', ProductStatus::PUBLISHED);
    }

    /**
     * Relations
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'product_attribute')->withPivot('value')->withTimestamps();
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_color')->withPivot('id', 'price')->withTimestamps();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
