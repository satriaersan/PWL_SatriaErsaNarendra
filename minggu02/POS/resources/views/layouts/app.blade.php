<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Website')</title>
    <!-- Tailwind CSS melalui CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <!-- Menu navigasi -->
            <div>
                <ul class="flex space-x-4">
                    <li>
                        <a href="{{ route('home') }}" class="text-gray-600 hover:text-blue-500">Home</a>
                    </li>
                    <!-- Dropdown untuk kategori Products -->
                    <li class="relative group">
                        <a href="#" class="text-gray-600 hover:text-blue-500">Products</a>
                        <ul class="absolute left-0 mt-2 w-40 bg-white border rounded shadow opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <li>
                                <a href="/category/food-beverage" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Food & Beverage</a>
                            </li>
                            <li>
                                <a href="/category/beauty-health" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Beauty & Health</a>
                            </li>
                            <li>
                                <a href="/category/home-care" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Home Care</a>
                            </li>
                            <li>
                                <a href="/category/baby-kid" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Baby & Kid</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <!--link ke halaman user, parameter id sesuai kebutuhan -->
                        <a href="{{ url('/user/1') }}" class="text-gray-600 hover:text-blue-500">User</a>
                    </li>
                    <li>
                        <a href="{{ route('sales') }}" class="text-gray-600 hover:text-blue-500">Sales</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten halaman -->
    <div class="container mx-auto p-4">
        @yield('content')
    </div>
</body>
</html>
