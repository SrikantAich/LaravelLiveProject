<link rel="icon" href="{{ asset('vendor/bladewind/images/logo.png') }}">
<title>Instacart - Page not found!</title>
<script src="https://cdn.tailwindcss.com"></script>
<section class="bg-white dark:bg-gray-900 ">
    <div class="container min-h-screen px-6 py-12 mx-auto lg:flex lg:items-center lg:gap-12">
        <div class="wf-ull lg:w-1/2">
            <h2 class="text-xl font-medium text-blue-500 dark:text-blue-400">404 error</h2>
            <h1 class="mt-3 text-2xl font-semibold text-gray-800 dark:text-white md:text-3xl">Page not found</h1>
            <p class="mt-4 text-gray-500 dark:text-gray-400">Sorry, the page you are looking for doesn't exist.</p>

            <div class="flex items-center mt-6 gap-x-3">
                <button class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                    <a href="{{route('dashboard')}}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:rotate-180">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                    </svg></a>
                    <span>Go back</span>
                </button>
            </div>
        </div>

        <div class="relative w-full mt-8 lg:w-1/2 lg:mt-0">
            <img class=" w-full lg:h-[32rem] h-80 md:h-96 rounded-lg object-cover " src="{{asset('CSS/images/backdrop2.jpg')}}" alt="404pageImage">
        </div>
    </div>
</section>