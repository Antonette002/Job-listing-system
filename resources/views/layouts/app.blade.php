<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen">
    
    <!-- Header -->
    <header class="bg-gray-800 text-white p-4 shadow">
        <h1 class="text-xl font-bold">Dashboard</h1>
        <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-sm font-semibold px-4 py-2 rounded">
            Logout
        </button>
    </form>
    </header>

    <!-- Main Section: Sidebar + Main Content -->
    <div class="flex flex-1 bg-gray-50">

        <!-- Sidebar -->
        <nav class="w-64 bg-white border-r border-gray-200 p-4">
            <ul>
                    <a href="{{ route('applicants.index') }}" class="block p-2 hover:bg-gray-100 rounded">👥 Applicants</a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('applications.index') }}" class="block p-2 hover:bg-gray-100 rounded">📄 Applications</a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('messages.index') }}" class="block p-2 hover:bg-gray-100 rounded">💬 Messages</a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('feedbacks.index') }}" class="block p-2 hover:bg-gray-100 rounded">⭐ Feedback</a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
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

