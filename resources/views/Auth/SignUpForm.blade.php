<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="icon" href="{{ asset('CSS/images/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{ url('CSS/style.css') }}">
    <title>Instacart - Sign Up</title>
  
</head>
<body class="bg-gray-100 dark:bg-gray-900">

<div class="flex items-center justify-center min-h-screen">
    <div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 lg:max-w-6xl">
        <div class="hidden bg-cover lg:block lg:w-3/5" style="background-image: url('CSS/images/backdrop2.jpg');"></div>

        <div class="w-full px-6 py-8 md:px-8 lg:w-1/2">
            <div class="flex justify-center mx-auto">
                <img class="w-auto h-24 sm:h-30" src="{{ asset('CSS/images/logo.png') }}" alt="Logo">
            </div>

            <p class="mt-3 text-xl text-center text-gray-600 dark:text-gray-200">
                Create your account!
            </p>

            <!-- Displaying validation errors -->
            @if ($errors->any())
                <div class="mt-4">
                    <div class=" text-red-700 p-2 rounded">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form action="{{ route('signup.post') }}" method="POST" id="signupForm">
                @csrf
                <div class="mt-4">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="name">Name</label>
                    <input id="name" name="name" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" required />
                </div>
                <div class="mt-4">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="signupEmail">Email Address</label>
                    <input id="signupEmail" name="email" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" type="email" required />
                </div>

                <div class="mt-4">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="signupPassword">Password</label>
                    <input id="signupPassword" name="password" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" type="password" required />
                </div>

                <div class="mt-4">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="confirmPassword">Confirm Password</label>
                    <input id="confirmPassword" name="password_confirmation" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" type="password" required />
                </div>

                <div class="mt-4 flex items-center">
                    <input type="checkbox" id="terms" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600" required />
                    <label for="terms" class="ml-2 text-sm text-gray-600 dark:text-gray-200">I accept the <a href="{{ route('terms_and_conditions') }}" class="text-blue-600 hover:underline">terms and conditions</a></label>
                </div>

                <div class="mt-6">
                    <button type="submit" id="signupButton" class="w-full px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-gray-800 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-50">
                        Sign Up
                    </button>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <span class="w-1/5 border-b dark:border-gray-600 md:w-1/4"></span>
                    <a href="{{ route('login.form') }}" class="text-xs text-gray-500 uppercase dark:text-gray-400 hover:underline">or login</a>
                    <span class="w-1/5 border-b dark:border-gray-600 md:w-1/4"></span>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('signupForm').addEventListener('submit', function(event) {
        const password = document.getElementById('signupPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        const button = document.getElementById('signupButton');
        
        if (password !== confirmPassword) {
            event.preventDefault(); // Prevent form submission
            alert('Passwords do not match!'); // Alert for mismatched passwords
            button.innerHTML = 'Sign Up'; // Reset the button text
            button.disabled = false; // Re-enable the button
        } else {
            alert('Registration Successful'); // Alert for processing
            button.innerHTML = 'Processing...'; // Change button text to indicate processing
            button.disabled = true; // Disable the button
        }
    });
</script>

</body>
</html>
