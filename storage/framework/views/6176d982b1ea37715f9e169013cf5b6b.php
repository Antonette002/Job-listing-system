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
            <a href="/" class="text-2xl font-bold text-blue-900">Nchito</a>
            <div>
                <a href="<?php echo e(route('company.login')); ?>" 
                   class="text-white bg-gray-800 hover:bg-gray-900 px-4 py-2 rounded-md font-semibold transition duration-300">
                   Admin Login
                </a>
            </div>
        </div>
    </div>
</nav>

        </div>
    </div>
</nav>


    <!-- Main content -->
    <main class="flex-grow flex flex-col items-center justify-center px-4 text-center max-w-xl mx-auto">
        <h1 class="text-5xl font-extrabold text-blue-900 mb-6 mt-12">
            Welcome to <span class="text-sky-400">Nchito</span> 👋
        </h1>

        <p class="text-lg text-gray-700 mb-12 px-4">
            Discover your next opportunity. Apply, hire, and grow with Nchito.
        </p>

        <a href="<?php echo e(route('applicant.login')); ?>" 
           class="bg-sky-500 hover:bg-sky-600 text-white font-semibold px-8 py-4 rounded-lg shadow-lg transition duration-300">
            Explore Opportunities
        </a>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-6 text-center text-gray-500 text-sm">
        &copy; June 2025 Nchito. All rights reserved.
    </footer>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\job-listing\resources\views/home.blade.php ENDPATH**/ ?>