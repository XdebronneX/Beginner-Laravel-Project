<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Pet Clinic')</title>
    <!-- Font Awesome (For Icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gradient-to-b from-gray-100 to-blue-100 min-h-screen flex flex-col">
    @include('layouts.flash-messages')
    @include('partials.header')
    <div class="container mx-auto mt-24 flex-1">
        @yield('content')
    </div>

    <footer class="bg-white py-4 text-center text-gray-600 shadow-md mt-10">
        &copy; 2022 Pet Clinic. All rights reserved.
    </footer>

    @yield('scripts')

</body>
</html>
