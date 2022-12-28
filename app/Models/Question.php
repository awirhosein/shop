<?php

namespace App\Models;

use App\Models\Traits\QuestionRelations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Question extends Model
{
    use HasFactory, SoftDeletes, QuestionRelations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'parent_id',
        'text',
        'approved_at',
        'type'
    ];

    /**
     * etc
     */
    public function is_approved(): bool
    {
        return (bool)$this->approved_at;
    }
}
