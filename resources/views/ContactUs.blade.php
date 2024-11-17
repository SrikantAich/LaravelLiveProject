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
    <title>Instacart | Contact Us</title>

</head>
<body>
    <section id="header">
        <a href="{{ route('dashboard') }}" style="display: flex; flex-direction: row; align-items: center;">
            <img src="{{ asset('CSS/images/logo.png') }}" class="w-16 h-16 logo" alt="logo">
            <h3><b>I</b>nsta<b>C</b>art</h3>
        </a>
        <div>
            <ul id="navbar">
                <li><a  href="{{route('dashboard')}}">Home</a></li>
                <li><a href="{{route('shop')}}">Shop</a></li>
                <li><a href="{{route('sale')}}">Sale</a></li>
                <li><a class="active" href="{{route('contact')}}">Contact</a></li>
                <li class="lg-bag"><a href="{{route('cart')}}"><i class="fa-solid fa-bag-shopping"></i></a></li>
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

    <section id="page-header" class="about-header">
        <h2>#let's_talk</h2>
        <p>LEAVE A MESSAGE, We love to hear from you!</p>
    </section>

    <section id="contact-details" class="section-p1">
        <div class="details">
            <span>GET IN TOUCH</span>
            <h2>Visit one of our agency loction or Contact us today</h2>
            <h3>Head Office</h3>
            <div>
                <li>
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <p>Bhadrak,Odisha-756115</p>
                </li>
                <li>
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <p>Contact@example.com</p>
                </li>
                <li>
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <p>Contact@example.com</p>
                </li>
                <li>
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <p>Monday to Saturday 9.00am to 9.00pm</p>
                </li>
            </div>
        </div>

        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29788.304472449814!2d86.48201795844986!3d21.05116165861224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a1bf587cd8ce1f1%3A0x820d86656eae5320!2sBhadrak%2C%20Odisha!5e0!3m2!1sen!2sin!4v1731845921164!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

    </section>

    <section id="form-details">
        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf <!-- Include CSRF Token -->
            <span>LEAVE A MESSAGE</span>
            <h2>We love to hear from you</h2>
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="text" name="subject" placeholder="Subject" required>
            <textarea name="message" id="" cols="30" rows="10" placeholder="Your MESSAGE" required></textarea>
            <button class="normal" type="submit">Submit</button>
        </form>
        <div class="people">
            <div>
                <img src="{{asset('CSS/images/avatar.png')}}" alt="">
                <p><span>JOHN DOE</span> Customer Relations Manager <br> Phone no: 1234567890 <br>
                Email: contact@example.com</p>
            </div>
        </div>
    </section>
    
    <script src="script.js">
    </script>
</body>

</html>