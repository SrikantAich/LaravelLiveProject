<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="./assets/icon.png" type="image/.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ url('CSS/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <link rel="icon" href="{{ asset('CSS/images/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Instacart | Shop</title>

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
                <li><a  href="{{ route('dashboard') }}">Home</a></li>
                <li><a class="active" href="{{route('shop')}}">Shop</a></li>
                <li><a href="{{route('sale')}}">Sale</a></li>
          
                <li><a href="{{route('contact')}}">Contact</a></li>
                <li class="lg-bag"><a href="{{ route('cart') }}"><i class="fa-solid fa-bag-shopping"></i></a></li>
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
        <h2>#stayhome</h2>
        <p>Save more with coupons & up to 70% off!</p>
      </section>
      <section id="search-bar" style="text-align: center; margin: 20px 0;">
        <input 
            type="text" 
            id="searchInput" 
            placeholder="Search products..." 
            style="width: 50%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px;"
        >
    </section>
    

    <section id="product1" class="section-p1">
        <h2>Products</h2>
    
        @foreach ($products as $category => $products)
            <div class="category-section">
                <h2 style="font-weight: 900; font-size: 2xl;">{{ $category }}</h2>
                <div class="pro-container">
                    @foreach ($products as $product)
                        <div class="pro" data-name="{{ strtolower($product->name) }}" data-brand="{{ strtolower($product->brand) }}">
                            <img src="{{ asset($product->image) }}" alt="P-{{ $product->id }}" style="width: 250px; height: 150px; object-fit: contain;">
                            <div class="des">
                                <span>{{ $product->brand }}</span>
                                <h5>{{ $product->name }}</h5>
                                <div class="star">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < $product->rating)
                                            <i class="fa-solid fa-star"></i>
                                        @else
                                            <i class="fa-regular fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <h4>₹{{ number_format($product->price, 2) }}</h4>
                            </div>
                            <a href="#" class="cart" data-product-id="{{ $product->id }}">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </section>
      
    

<section id="pagination" class="section-p1">
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>

</section>
<section id="newsletter" class="section-p1 section-m1">
    <div class="newstext">
        <h4>Sign Up for Newsletters</h4>
        <p>Get email updates about our latest shop and <span>special offers.</span></p>
    </div>
    <div class="form">
        <form action="{{ route('newsletter.subscribe') }}" method="POST" style="display: flex; align-items: center; gap: 10px;">
            @csrf
            <input type="email" name="email" placeholder="Your email address" required style="flex: 1; padding: 10px; font-size: 14px; border: 1px solid #ccc; border-radius: 5px;">
            <button type="submit" class="normal" style="padding: 10px 20px; background-color:#088178; color: #fff; border: none; border-radius: 5px; font-size: 14px; cursor: pointer;">
                Sign Up
            </button>
        </form>
    </div>
</section>    


<footer class="section-p1">
    <div class="col">
        <img src="{{ asset('CSS/images/logo.png') }}" class="w-20 h-20 logo" alt="logo">
        <h4>Contact</h4>
        <p><strong>Address:</strong>Bhadrak,Odisha-756115</p>
        <p><strong>Phone:</strong>(+91) 01 2345 6763</p>
        <p><strong>Hours:</strong>10:00 - 18:00, Mon - Sat</p>
        <div class="follow">
            <h4>Follow us</h4>
            <div class="icon">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-linkedin"></i>
                <i class="fa-brands fa-twitter"></i>
            </div>
        </div>
    </div>
    <div class="col">
        <h4>About</h4>
        <a href="#">About Us</a>
        <a href="#">Delivery Information</a>
        <a href="#">Privacy Poilcy</a>
        <a href="#">Terms & Condition</a>
        <a href="#">Contact Us</a>
    </div>
    <div class="col">
        <h4>My Account </h4>
        <a href="#">Sign In</a>
        <a href="#">View Cart</a>
        <a href="#">My WishList</a>
        <a href="#">Track My Order</a>
        <a href="#">Help</a>
    </div>
    <div class="col install">
        <h4>Install App</h4>
        <p>From App Store or Google Play</p>
        <div class="row">
            <img src="{{ asset('CSS/images/app.jpg') }}" alt="app">
            <img src="{{ asset('CSS/images/play.jpg') }}" alt="play">
        </div>
        <p>Secured Payment Gateways</p>
        <img src="{{ asset('CSS/images/pay.png') }}" alt="pay">
    </div>
    <div class="copyright">
        <p>2024, Laravel Live Project</p>
    </div>
</footer>



    <script src="script.js">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on('click', '.cart', function (e) {
            e.preventDefault();
    
            const productId = $(this).data('product-id'); // Ensure the button has a `data-product-id` attribute
    
            $.ajax({
                url: '{{ route("cart.add") }}', // Adjust to your route name
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Include CSRF token
                    product_id: productId,
                },
                success: function (response) {
                    alert(response.message); // Notify the user
                    console.log(response.cart); // Optional: Log cart details
                },
                error: function (xhr) {
                    alert(xhr.responseJSON.error); // Handle errors
                },
            });
        });
    </script>
<script>
    document.getElementById('searchInput').addEventListener('input', function () {
        const query = this.value.toLowerCase(); // Get the search query
        const categories = document.querySelectorAll('.category-section'); // Select all category sections

        categories.forEach(category => {
            let hasVisibleProducts = false; // Track if the category has matching products
            const products = category.querySelectorAll('.pro'); // Get all products in the category

            products.forEach(product => {
                const productName = product.getAttribute('data-name'); // Get product name
                const productBrand = product.getAttribute('data-brand'); // Get product brand

                // Check if query matches product name or brand
                if (productName.includes(query) || productBrand.includes(query)) {
                    product.style.display = 'block'; // Show matching products
                    hasVisibleProducts = true; // Mark the category as having matching products
                } else {
                    product.style.display = 'none'; // Hide non-matching products
                }
            });

            // Show or hide the category title based on matching products
            const categoryTitle = category.querySelector('h2');
            if (hasVisibleProducts) {
                categoryTitle.style.display = 'block'; // Show category name
                category.style.display = 'block'; // Ensure the category section is visible
            } else {
                categoryTitle.style.display = 'none'; // Hide category name
                category.style.display = 'none'; // Hide the whole category section
            }
        });
    });
</script>


    
    
</body>

</html>