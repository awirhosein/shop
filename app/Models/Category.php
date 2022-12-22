<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
    ];

    /**
     * Scope
     */
    public function scopeParents($query, int $except = null)
    {
        $query->where('parent_id', null)->where('id', '!=', $except);
    }

    /**
     * Relation
     */
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->hasOne(self::class, 'id', 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }

    /**
     * etc
     */
    public function is_parent(): bool
    {
        return !$this->parent_id;
    }

    public function is_child(): bool
    {
        return (bool)$this->parent_id;
    }
}
