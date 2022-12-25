<?php

namespace App\Models;

use App\Models\Traits\CategoryRelations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Category extends Model
{
    use HasFactory, SoftDeletes, CategoryRelations;

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
}
