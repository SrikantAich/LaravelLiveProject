<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>Signup Form</title>
</head>
<body class="bg-gray-100 dark:bg-gray-900">

<div class="flex items-center justify-center min-h-screen">
    <div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 lg:max-w-6xl">
        <div class="hidden bg-cover lg:block lg:w-3/5" style="background-image: url('/vendor/bladewind/images/backdrop2.jpg');"></div>

        <div class="w-full px-6 py-8 md:px-8 lg:w-1/2">
            <div class="flex justify-center mx-auto">
                <img class="w-auto h-24 sm:h-30" src="{{ asset('vendor/bladewind/images/AlbedoBase_XL_Design_a_modern_versatile_logo_for_an_ecommerce_1-removebg-preview.png') }}" alt="Logo">
            </div>

            <p class="mt-3 text-xl text-center text-gray-600 dark:text-gray-200">
                Create your account!
            </p>

            <form>
                <div class="mt-4">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="signupEmail">Email Address</label>
                    <input id="signupEmail" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" type="email" required />
                </div>

                <div class="mt-4">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="signupPassword">Password</label>
                    <input id="signupPassword" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" type="password" required />
                </div>

                <div class="mt-4">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="confirmPassword">Confirm Password</label>
                    <input id="confirmPassword" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" type="password" required />
                </div>

                <div class="mt-4 flex items-center">
                    <input type="checkbox" id="terms" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600" required />
                    <label for="terms" class="ml-2 text-sm text-gray-600 dark:text-gray-200">I accept the <a href="{{route('TermsAndConditions')}}" class="text-blue-600 hover:underline">terms and conditions</a></label>
                </div>

                <div class="mt-6">
                    <button class="w-full px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-gray-800 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-50">
                        Sign Up
                    </button>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <span class="w-1/5 border-b dark:border-gray-600 md:w-1/4"></span>

                    <a href="{{route('Login')}}" class="text-xs text-gray-500 uppercase dark:text-gray-400 hover:underline">or login</a>

                    <span class="w-1/5 border-b dark:border-gray-600 md:w-1/4"></span>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
