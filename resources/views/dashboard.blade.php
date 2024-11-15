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
    <title>Instacart </title>

</head>

<body>
    <section id="header">
        <a href="{{ route('dashboard') }}" style="display: flex; flex-direction: row; align-items: center;">
            <img src="{{ asset('CSS/images/logo.png') }}" class="w-16 h-16 logo" alt="logo">
            <h3><b>I</b>nsta<b>C</b>art</h3>
        </a>
        <div>
            <ul id="navbar">
                <li><a class="active" href="/index.html">Home</a></li>
                <li><a href="./sub-pages/shop.html">Shop</a></li>
                <li><a href="./sub-pages/blog.html">Sale</a></li>
                <li><a href="./sub-pages/about.html">About</a></li>
                <li><a href="./sub-pages/contact.html">Contact</a></li>
                <li class="lg-bag"><a href="./sub-pages/cart.html"><i class="fa-solid fa-bag-shopping"></i></a></li>
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
                                <button type="submit" class="block px-4 py-2 ">Logout</button>
                            </form>
                        </div>
                    </div>

                </div>

            </ul>
        </div>
        <div id="mobile">

            <a href="./sub-pages/cart.html"><i class="fa-solid fa-bag-shopping"></i></a>
            <i id="bar" class="fa-solid fa-bars"></i>
        </div>
    </section>
    <section id="hero">
        <h2>Super Value Deals</h2>
        <h1>On all products</h1>
        <p>Save more with coupons & up to 70% off!</p>
        <a href="{{ route('dashboard') }}"><button> Shop Now</button></a>
    </section>
    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="{{ asset('CSS/images/f1.png') }}" alt="F-1">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="{{ asset('CSS/images/f2.png') }}" alt="F-1">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="{{ asset('CSS/images/f3.png') }}" alt="F-1">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="{{ asset('CSS/images/f6.png') }}" alt="F-1">
            <h6>24/7 Support</h6>
        </div>
    </section>

    
    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Modern Design</p>
        <div class="pro-container">
            @foreach (array_slice($products->all(), 0, 12) as $product)
                <div class="pro">
                    <!-- Make sure the images are correctly stored in the public folder -->
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
                        <h4>₹{{ number_format($product->price, 2) }}</h4> <!-- Format price to 2 decimal places -->
                    </div>
                    <a href="#" class="cart"><i class="fa-solid fa-cart-shopping"></i></a>
                </div>
            @endforeach
        </div>
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
            <p><strong>Address:</strong>562 Wellington Road, Street 32,san Freancisco</p>
            <p><strong>Phone:</strong>+01 2222 3665 / (+91) 01 2345 6763</p>
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
    <script src="./js/responsiveHome.js"></script>
</body>

</html>
