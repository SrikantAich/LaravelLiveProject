<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class SaleController extends Controller
{
    public function Sale()
    {
        $products = Product::all();  // Fetch products
        return view('Sale', compact('products'));  // Pass to the view
    }
}
