<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Models\Checkout;

class CheckOutController extends Controller
{
    public function subTotal()
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
        return view('CheckOut', ['cart' => $cart, 'cartTotal' => $cartTotal]);
    }
    public function store(Request $request)
{
    // Process the data here, for example:
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string',
    ]);

    // Save the data to the database
    // Example:
    $order = new Checkout();
    $order->name = $validated['name'];
    $order->address = $validated['address'];
    $order->country = $validated['country'];
    $order->city = $validated['city'];
    $order->email = $validated['email'];
    $order->phone = $validated['phone'];
    $order->save();

    return redirect()->route('payment'); // Redirect to a confirmation page
}

    
}
//
