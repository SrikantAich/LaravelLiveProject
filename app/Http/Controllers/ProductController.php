<?php
namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();  // Fetch all products from the database
        dd($products);  // Dump the products to see the data
        return view('dashboard', compact('products'));  // Pass products to the view
    }
}    
