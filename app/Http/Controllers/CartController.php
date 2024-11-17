<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class CartController extends Controller
{
    // Add a product to the cart
    public function addToCart(Request $request)
    {
        $productId = (int) $request->input('product_id');
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        // Retrieve the cart from the session or initialize it
        $cart = Session::get('cart', []);

        // Add or update the product in the cart
        if (isset($cart[$productId])) {
            // If the product is already in the cart, increment the quantity
            $cart[$productId]['quantity'] += 1;
        } else {
            // Otherwise, add the product with an initial quantity of 1
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,
            ];
        }

        // Store the updated cart in the session
        Session::put('cart', $cart);

        return response()->json(['message' => 'Product added to cart', 'data' => $cart]);
    }

    // Update the quantity of a product in the cart
    public function updateCart(Request $request)
    {
        $productId = (int) $request->input('product_id');
        $action = $request->input('action'); // 'increase' or 'decrease'
    
        // Retrieve the cart from the session
        $cart = Session::get('cart', []);
    
        // Check if the product exists in the cart
        if (!isset($cart[$productId])) {
            return response()->json(['error' => 'Product not found in cart'], 404);
        }
    
        // Get the current quantity
        $currentQuantity = $cart[$productId]['quantity'];
    
        // Handle the increase or decrease action
        if ($action === 'increase') {
            $newQuantity = $currentQuantity + 1;
        } elseif ($action === 'decrease' && $currentQuantity > 1) {
            $newQuantity = $currentQuantity - 1;
        } else {
            return response()->json(['error' => 'Invalid action or quantity cannot be less than 1'], 400);
        }
    
        // Update the quantity in the cart
        $cart[$productId]['quantity'] = $newQuantity;
    
        // Store the updated cart in the session
        Session::put('cart', $cart);
    
        // Calculate the new subtotal
        $newSubtotal = $cart[$productId]['price'] * $newQuantity;
    
        // Return the updated quantity and subtotal
        return response()->json([
            'message' => 'Cart updated',
            'new_quantity' => $newQuantity,
            'new_subtotal' => $newSubtotal,
        ]);
    }
    


    // Remove a product from the cart
    public function removeFromCart(Request $request)
    {
        $productId = (int) $request->input('product_id');

        // Retrieve the cart from the session
        $cart = Session::get('cart', []);

        // Check if the product exists in the cart
        if (!isset($cart[$productId])) {
            return response()->json(['error' => 'Product not found in cart'], 404);
        }

        // Remove the product from the cart
        unset($cart[$productId]);

        // Store the updated cart in the session
        Session::put('cart', $cart);

        return response()->json(['message' => 'Product removed from cart', 'data' => $cart]);
    }

    // View the current cart
    public function viewCart()
    {
        // Retrieve the cart from the session
        $cart = Session::get('cart', []);

        // Initialize cart total
        $cartTotal = 0;

        // Calculate the total price of all items in the cart
        foreach ($cart as $item) {
            $cartTotal += $item['price'] * $item['quantity'];
        }

        // Check if the cart is empty
        if (empty($cart)) {
            return view('cart', ['message' => 'Your cart is empty']);
        }

        // Pass the cart data and total to the Blade view
        return view('cart', ['cart' => $cart, 'cartTotal' => $cartTotal]);
    }
}
