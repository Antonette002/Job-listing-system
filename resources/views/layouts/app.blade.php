<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts') {{-- For optional custom scripts --}}
</head>
<body class="flex flex-col min-h-screen bg-gray-50">

    <!-- Header -->
    <header class="bg-gray-800 text-white p-4 shadow flex justify-between items-center">
        <h1 class="text-xl font-bold">@yield('header-title', 'Dashboard')</h1>

    </header>

    <!-- Main Section: Sidebar + Main -->
    <div class="flex flex-1">
        {{-- Optional Sidebar (only appears if defined in view) --}}
        @hasSection('sidebar')
            @yield('sidebar')
        @endif

        <!-- Main Content Area -->
        <main class="flex-1 p-6 overflow-auto">
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white p-4 text-center">
        &copy; 2025 Nchito. All rights reserved.
    </footer>

</body>
</html>

