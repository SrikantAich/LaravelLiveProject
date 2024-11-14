<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instacart - Login</title>

    <!-- CSS and JS Assets -->
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet">
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" type="text/css" href="{{ url('CSS/style.css') }}">
    <link rel="icon" href="{{ asset('CSS/images/logo.png') }}">
</head>
<body class="bg-gray-100 dark:bg-gray-900 min-h-screen flex items-center justify-center">

<div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 lg:max-w-6xl">
    <div class="hidden bg-cover lg:block lg:w-3/5" style="background-image: url('{{ asset('CSS/images/backdrop2.jpg') }}')"></div>

    <div class="w-full px-6 py-8 md:px-8 lg:w-1/2">
        <div class="flex justify-center mx-auto">
            <img class="w-auto h-24 sm:h-30" src="{{ asset('CSS/images/logo.png')}}" alt="Logo">
        </div>

        <p class="mt-3 text-xl text-center text-gray-600 dark:text-gray-200">Welcome back!</p>

        @if ($errors->has('login'))
            <div class="mt-4 p-4 text-red-600 bg-red-100 border border-red-400 rounded">
                {{ $errors->first('login') }}
            </div>
        @endif
        <!-- Google Sign-In Button -->
        <a href="#" class="flex items-center justify-center mt-4 text-gray-600 transition-colors duration-300 transform border rounded-lg dark:border-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
            <div class="px-4 py-2">
                <svg class="w-6 h-6" viewBox="0 0 40 40">
                    <path d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.045 27.2142 24.3525 30 20 30C14.4775 30 10 25.5225 10 20C10 14.4775 14.4775 9.99999 20 9.99999C22.5492 9.99999 24.8683 10.9617 26.6342 12.5325L31.3483 7.81833C28.3717 5.04416 24.39 3.33333 20 3.33333C10.7958 3.33333 3.33335 10.7958 3.33335 20C3.33335 29.2042 10.7958 36.6667 20 36.6667C29.2042 36.6667 36.6667 29.2042 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z" fill="#FFC107"/>
                    <path d="M5.25497 12.2425L10.7308 16.2583C12.2125 12.59 15.8008 9.99999 20 9.99999C22.5491 9.99999 24.8683 10.9617 26.6341 12.5325L31.3483 7.81833C28.3716 5.04416 24.39 3.33333 20 3.33333C13.5983 3.33333 8.04663 6.94749 5.25497 12.2425Z" fill="#FF3D00"/>
                    <path d="M20 36.6667C24.305 36.6667 28.2167 35.0192 31.1742 32.34L26.0159 27.975C24.3425 29.2425 22.2625 30 20 30C15.665 30 11.9842 27.2359 10.5975 23.3784L5.16254 27.5659C7.92087 32.9634 13.5225 36.6667 20 36.6667Z" fill="#4CAF50"/>
                    <path d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.7592 25.1975 27.56 26.805 26.0133 27.9758C26.0142 27.975 26.015 27.975 26.0158 27.9742L31.1742 32.3392C30.8092 32.6708 36.6667 28.3333 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z" fill="#1976D2"/>
                </svg>
            </div>
            <span class="w-5/6 px-4 py-3 font-bold text-center">Sign in with Google</span>
        </a>
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="mt-4">
                <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Email Address</label>
                <input name="email" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400" type="email" required>
            </div>

            <div class="mt-4">
                <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Password</label>
                <input name="password" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400" type="password" required>
            </div>

            <div class="flex items-center mt-4">
                <input id="remember" name="remember" type="checkbox" class="text-gray-700 bg-white border rounded dark:bg-gray-800 dark:border-gray-600">
                <label for="remember" class="ml-2 text-sm text-gray-600 dark:text-gray-200">Remember Me</label>
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full px-6 py-3 text-sm font-medium tracking-wide text-white bg-gray-800 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-gray-300">
                    Sign in
                </button>
            </div>
        </form>

        <p class="mt-6 text-sm text-center text-gray-400">Don’t have an account yet? <a href="{{route('signup.form')}}" class="text-gray-500 hover:underline">Sign up</a>.</p>
    </div>
</div>

</body>
</html>
