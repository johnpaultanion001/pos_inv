<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'category_id',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function products_sizes_prices()
    {
        return $this->hasMany(ProductSizePrice::class, 'product_id' , 'id');
    }
}
