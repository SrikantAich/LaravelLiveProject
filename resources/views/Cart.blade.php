<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instacart | Cart</title>
    <link rel="icon" href="{{ asset('CSS/images/logo.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('CSS/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</head>

<body>
    <!-- NavBar -->
    <section id="header">
        <a href="{{ route('dashboard') }}" style="display: flex; flex-direction: row; align-items: center;">
            <img src="{{ asset('CSS/images/logo.png') }}" class="w-16 h-16 logo" alt="logo">
            <h3><b>I</b>nsta<b>C</b>art</h3>
        </a>
        <div>
            <ul id="navbar">
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                <li><a href="{{route('shop')}}">Shop</a></li>
                <li><a href="{{route('sale')}}">Sale</a></li>
         
                <li><a href="{{route('contact')}}">Contact</a></li>
                <li class="lg-bag" ><a href="{{ route('cart') }}"><i class="fa-solid fa-bag-shopping"></i></a></li>
                <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>

                <div class="userDropdown">
                    <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown"
                        data-dropdown-placement="bottom-start" class="w-10 h-6 rounded-full cursor-pointer "
                        src="{{ asset('vendor/bladewind/icons/solid/user-circle.svg') }}" alt="User dropdown">

                    <!-- Dropdown menu -->
                    <div id="userDropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="font-medium truncate">{{ Auth::user()->email }}</div>
                        </div>
                        <div class="py-1">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="block px-4 py-2">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </ul>
        </div>
        <div id="mobile">
            <a href="{{ route('cart') }}"><i class="fa-solid fa-bag-shopping"></i></a>
            <i id="bar" class="fa-solid fa-bars"></i>
        </div>
    </section>

    <!-- Hero-Image -->
    <section id="page-header" class="about-header">
        <h2>#CheckoutNow</h2>
        <p>Buy your favorite items and clear your cart.</p>
    </section>

    <!-- Cart-Section -->
    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($cart as $item)
                <tr>
                    <td>
                        <a href="{{ route('cart.remove', $item['id']) }}"><i class="fa-regular fa-circle-xmark"></i></a>
                    </td>
                    <td><img src="{{ asset($item['image']) }}" alt="P-{{ $item['id'] }}" /></td>
                    <td>{{ $item['name'] }}</td>
                    <td>₹{{ number_format($item['price'], 2) }}</td>
                    <td>
                        <button class="update-cart" data-id="{{ $item['id'] }}" data-action="decrease">-</button>
                        <span id="quantity-{{ $item['id'] }}">{{ $item['quantity'] }}</span>
                        <button class="update-cart" data-id="{{ $item['id'] }}" data-action="increase">+</button>
                    </td>
                    <td>₹{{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <!-- Checkout Details -->
    <section id="Checkout-Details" class="section-p1">
        <div id="coupon">
            <h3>Apply Coupon</h3>
            <div>
                <input type="text" placeholder="Enter Your Coupon Code" />
                <button class="normal">Apply</button>
            </div>
        </div>
        <div id="sub-total">
            <h3>Cart Totals</h3>
            <table>
                <tr>
                    <td>Cart Subtotal</td>
                    <td>₹{{ number_format($cartTotal, 2) }}</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>₹{{ number_format($cartTotal, 2) }}</strong></td>
                </tr>
            </table>
            <button class="normal"><a href="{{route('checkout')}}">Proceed to checkout</a></button>
        </div>
    </section>

    <script src="https://kit.fontawesome.com/19dfb206c9.js" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>

  <script>document.querySelectorAll('.update-cart').forEach(button => {
    button.addEventListener('click', function () {
        const productId = this.dataset.id;  // The ID of the product
        const action = this.dataset.action; // 'increase' or 'decrease'

        // Send the AJAX request to update the cart
        fetch('{{ route('cart.update') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',  // CSRF token for security
            },
            body: JSON.stringify({
                product_id: productId,
                action: action
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                // Check if the response contains a message indicating success
                const quantityElement = document.getElementById(`quantity-${productId}`);
                const newQuantity = data.new_quantity;

                // Update the quantity on the page
                quantityElement.textContent = newQuantity;

                // Update the subtotal for the product
                const subtotalCell = this.closest('tr').querySelector('td:last-child');
                subtotalCell.textContent = `₹${data.new_subtotal.toFixed(2)}`;
            } else if (data.error) {
                // Handle the case when there's an error
                alert(data.error);
            } else {
                // If no message or error is returned
                alert('Unexpected error occurred while updating the cart.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while updating the cart. Please try again.');
        });
    });
});
</script>

    </body>

</html>
