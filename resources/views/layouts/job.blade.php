<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Job Listings')</title>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

    <nav class="bg-white shadow p-4 mb-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-semibold text-blue-600">Job Listings</h1>
            <a href="{{ route('jobs.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Post a Job</a>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto p-4">
        @yield('content')
    </main>

</body>
</html>
