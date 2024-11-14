<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    <link rel="icon" href="{{ asset('vendor/bladewind/images/AlbedoBase_XL_Design_a_modern_versatile_logo_for_an_ecommerce_1-removebg-preview.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" type="text/css" href="{{ url('CSS/style.css') }}">
    <link rel="icon" href="{{ asset('CSS/images/logo.png') }}">
    <title>Instacart - Terms and Conditions</title>
</head>
<body class="bg-gray-100 dark:bg-gray-900">

<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-4xl mx-auto bg-white rounded-lg shadow-lg dark:bg-gray-800 p-8"> <!-- Added padding for full-page look -->
        <h1 class="text-2xl font-bold text-center text-gray-800 dark:text-gray-200">Terms and Conditions</h1>

        <p class="mt-3 text-gray-600 dark:text-gray-200">
            Please read these Terms and Conditions carefully before using our services. By accessing or using our website, you agree to be bound by these terms.
        </p>

        <div class="mt-4 text-gray-700 dark:text-gray-300">
            <h2 class="text-xl font-semibold mt-4">1. Acceptance of Terms</h2>
            <p>
                By accessing or using our services, you confirm that you accept these Terms and Conditions and agree to comply with them. If you do not agree to these terms, please do not use our services.
            </p>

            <h2 class="text-xl font-semibold mt-4">2. Use of Services</h2>
            <p>
                You agree to use our services only for lawful purposes and in a way that does not infringe on the rights of others, restrict, or inhibit anyone else's use and enjoyment of the services.
            </p>

            <h2 class="text-xl font-semibold mt-4">3. Privacy Policy</h2>
            <p>
                We respect your privacy and are committed to protecting your personal information. Our Privacy Policy explains how we handle your data. Please review this policy carefully.
            </p>

            <h2 class="text-xl font-semibold mt-4">4. Intellectual Property</h2>
            <p>
                All content provided on this site, including but not limited to text, graphics, and images, is the property of our service and is protected by applicable intellectual property laws. Unauthorized use of this content is strictly prohibited.
            </p>

            <h2 class="text-xl font-semibold mt-4">5. Limitation of Liability</h2>
            <p>
                We are not liable for any direct, indirect, incidental, consequential, or punitive damages arising from your use of or inability to use our services. All services are provided "as is" and "as available" without warranties of any kind.
            </p>

            <h2 class="text-xl font-semibold mt-4">6. Modifications to Terms</h2>
            <p>
                We reserve the right to modify these Terms and Conditions at any time. Any changes will be effective immediately upon posting. Your continued use of our services after changes have been made constitutes acceptance of the new terms.
            </p>

            <h2 class="text-xl font-semibold mt-4">7. Termination</h2>
            <p>
                We reserve the right to suspend or terminate your access to our services at any time, without notice, for conduct that we believe violates these terms or is harmful to other users or our business interests.
            </p>

            <h2 class="text-xl font-semibold mt-4">8. Governing Law</h2>
            <p>
                These terms shall be governed and construed in accordance with the laws of the applicable jurisdiction, without regard to its conflict of law provisions.
            </p>
        </div>

        <div class="mt-6">
            <a href="{{route('signup.form')}}" class="w-full px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-gray-800 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-50 text-center block">
                Back to SignUp
            </a>
        </div>
    </div>
</div>

</body>
</html>
