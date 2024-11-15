<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // The table associated with the model (optional if your table follows the Laravel naming convention)
    protected $table = 'products';

    // The attributes that are mass assignable (add the columns you want to be fillable)
   protected $fillable = [
    'name',
    'brand',
    'image',
    'price',
    'rating',
    'description',
    'expiry_date',
    'manufacturing_date',
    'category',
    'stock_quantity',
    'discount',
    'sku',
];

}

