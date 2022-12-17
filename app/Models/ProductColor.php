<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    const TABLE = 'product_color';
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = self::TABLE;
}
