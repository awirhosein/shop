<?php

namespace App\Models\Traits;

use App\Models\{Attribute, Category, Color, Comment, ProductColor, Question};

trait ProductRelations
{
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
        return $this->belongsToMany(Color::class, ProductColor::class)->withPivot('id', 'price')->withTimestamps();
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
