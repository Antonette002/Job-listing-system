<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <title>Nchito</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    <!-- Navigation -->
    <nav class="bg-[#1e293b] shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
         <a href="/" class="text-2xl font-bold text-white tracking-tight">Nchito</a>

            <a href="{{ route('company.login') }}" 
               class="bg-[#f97316] hover:bg-[#ea580c] text-white font-semibold px-5 py-2 rounded-md shadow transition duration-300">
               Admin Login
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="flex-grow bg-gradient-to-b from-sky-50 to-white py-20 px-6 text-center">
        <h1 class="text-5xl sm:text-6xl font-extrabold text-[#1e3a8a] leading-tight mb-4">
            Your Future Starts with <span class="text-sky-400">Nchito</span>
        </h1>
        <p class="text-lg sm:text-xl text-gray-600 max-w-2xl mx-auto mb-8">
            Where Zambian talent meets opportunity. Whether you're hiring or applying — you're in the right place.
        </p>
        <a href="{{ route('applicant.login') }}" 
           class="bg-[#2563eb] hover:bg-[#1d4ed8] text-white font-semibold px-8 py-4 rounded-lg shadow-lg transition duration-300">
            Explore Opportunities
        </a>
    </header>

    <!-- Features Section -->
    <section class="max-w-6xl mx-auto px-6 py-16 grid grid-cols-1 sm:grid-cols-3 gap-8 text-center">
        <div class="bg-white shadow rounded-xl p-6 hover:scale-105 transition duration-300">
            <div class="text-4xl mb-3 text-[#f97316]">🚀</div>
            <h3 class="font-semibold text-[#1e3a8a] text-lg mb-1">Easy Application</h3>
            <p class="text-gray-600 text-sm">Apply for jobs quickly and effortlessly with just a few clicks.</p>
        </div>
        <div class="bg-white shadow rounded-xl p-6 hover:scale-105 transition duration-300">
            <div class="text-4xl mb-3 text-[#2563eb]">🔍</div>
            <h3 class="font-semibold text-[#1e3a8a] text-lg mb-1">Verified Companies</h3>
            <p class="text-gray-600 text-sm">All companies go through strict verification so you only see real jobs.</p>
        </div>
        <div class="bg-white shadow rounded-xl p-6 hover:scale-105 transition duration-300">
            <div class="text-4xl mb-3 text-[#10b981]">💼</div>
            <h3 class="font-semibold text-[#1e3a8a] text-lg mb-1">Real Opportunities</h3>
            <p class="text-gray-600 text-sm">From internships to full-time roles, find what's right for your journey.</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-sm text-center p-6 mt-auto">
        <div class="mb-2">&copy; 2025 Nchito. All rights reserved.</div>
        <div>
            Contact: <a href="mailto:support@nchito.com" class="text-blue-400 underline">support@nchito.com</a> |
            <a href="tel:+260960939135" class="text-blue-400 underline">0960939135</a>
        </div>
    </footer>

</body>
</html>
