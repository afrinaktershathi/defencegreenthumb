<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    function stocks()
    {
        return $this->hasOne(Stock::class);
    }

    protected $casts = [
        'stock' => 'boolean'
    ];
}
