<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <title>Nchito</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="/" class="text-2xl font-bold text-[#1e3a8a]">Nchito</a>
                <div class="flex gap-4">
                    <a href="<?php echo e(route('applicant.login')); ?>" 
                       class="bg-[#2563eb] hover:bg-[#1d4ed8] text-white font-semibold px-4 py-2 rounded-md shadow-md transition duration-300 flex items-center justify-center">
                        Explore Opportunities
                    </a>
                    <a href="<?php echo e(route('company.login')); ?>" 
                       class="bg-[#f97316] hover:bg-[#ea580c] text-white font-semibold px-4 py-2 rounded-md shadow-md transition duration-300 flex items-center justify-center">
                       Admin Login
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <main class="flex-grow flex flex-col items-center justify-center px-4 text-center max-w-xl mx-auto">
        <h1 class="text-5xl font-extrabold text-[#1e3a8a] mb-6 mt-12">
            Welcome to <span class="text-sky-400">Nchito</span> 👋
        </h1>

        <p class="text-lg text-gray-700 mb-8 px-4">
            Discover your next opportunity. Apply, hire, and grow with Nchito.
        </p>

        <!-- Features Section -->
        <section class="w-full max-w-xl grid grid-cols-1 sm:grid-cols-3 gap-6 text-center mb-12 px-4">
          <div>
            <div class="text-4xl mb-2 text-[#f97316]">🚀</div>
            <h3 class="font-semibold text-[#1e3a8a] mb-1">Easy Application</h3>
            <p class="text-gray-600 text-sm">Apply for jobs quickly and easily.</p>
          </div>
          <div>
            <div class="text-4xl mb-2 text-[#2563eb]">🔍</div>
            <h3 class="font-semibold text-[#1e3a8a] mb-1">Verified Companies</h3>
            <p class="text-gray-600 text-sm">Trusted employers posting real jobs.</p>
          </div>
          <div>
            <div class="text-4xl mb-2 text-[#10b981]">💼</div>
            <h3 class="font-semibold text-[#1e3a8a] mb-1">Real Opportunities</h3>
            <p class="text-gray-600 text-sm">Find the right job for your career growth.</p>
          </div>
        </section>

        <a href="<?php echo e(route('applicant.login')); ?>" 
           class="bg-[#2563eb] hover:bg-[#1d4ed8] text-white font-semibold px-8 py-4 rounded-lg shadow-lg transition duration-300">
            Explore Opportunities
        </a>
    </main>

    <!-- Footer -->
     <footer class="bg-gray-800 text-white p-4 text-center">
        &copy; 2025 Nchito. All rights reserved.
    </footer>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\job-listing\resources\views/home.blade.php ENDPATH**/ ?>