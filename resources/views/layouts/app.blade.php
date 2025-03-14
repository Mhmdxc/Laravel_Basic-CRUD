<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title', 'Basic-CRUD')</title>
</head>
<body class="bg-gray-800 min-h-screen">
<div class="flex flex-col">
    <!-- Navbar -->
    <nav class="bg-blue-700 text-white border-b-5 border-b-blue-700 border-t-3 border-t-blue-700 p-4 relative">
        <div class="container mx-auto flex items-center justify-between relative">
            <!-- Left Side (Empty for balance) -->
            <div class="w-32"></div> <!-- Adjust width to match button size -->

            <!-- Centered Links with Border -->
            <div>
                <a href="{{ route('home') }}" class="bg-white px-2.5 py-2 rounded-lg ring-4 text-blue-500 text-xl font-semibold hover:text-blue-400 hover:drop-shadow-2xl focus:bg-blue-500 focus:text-white">Home</a>
                <span class="text-white text-3xl px-1 opacity-15">|</span>
                <a href="{{ route('products.index') }}" class="bg-white px-2.5 py-2 rounded-lg ring-4 text-blue-500 text-xl font-semibold hover:text-blue-400 hover:drop-shadow-2xl focus:bg-blue-500 focus:text-white">Products</a>
            </div>

            <!-- Right Side (Create Product Button) -->
            <a href="{{ route('products.create') }}" class="bg-white text-blue-600 px-2.5 py-2 rounded-3xl ring-3 font-semibold hover:text-blue-400 hover:drop-shadow-2xl focus:bg-blue-500 focus:text-white">Create Product</a>
        </div>
    </nav>
</div>
<div>
    @yield('content')
</div>
</body>
</html>
