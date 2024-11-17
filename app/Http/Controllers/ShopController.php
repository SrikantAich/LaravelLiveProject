<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function Products()
    {
        $products = Product::all()->groupBy('name');  // Fetch products
        return view('Shop', compact('products'));  // Pass to the view
    }
}
