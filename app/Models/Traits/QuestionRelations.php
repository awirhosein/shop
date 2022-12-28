<?php

namespace App\Models\Traits;

use App\Models\{User, Product};

trait QuestionRelations
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function answers()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }
}
