<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Dashboard'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?> 
</head>
<body class="flex flex-col min-h-screen bg-gray-50">

    <!-- Header -->
    <header class="bg-gray-800 text-white p-4 shadow flex justify-between items-center">
        <h1 class="text-xl font-bold"><?php echo $__env->yieldContent('header-title', 'Dashboard'); ?></h1>

    </header>

    <!-- Main Section: Sidebar + Main -->
    <div class="flex flex-1">
        
        <?php if (! empty(trim($__env->yieldContent('sidebar')))): ?>
            <?php echo $__env->yieldContent('sidebar'); ?>
        <?php endif; ?>

        <!-- Main Content Area -->
        <main class="flex-1 p-6 overflow-auto">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <!-- Footer -->
   <!-- Footer -->
<footer class="bg-gray-800 text-white p-4 text-center text-sm mt-10">
    <div class="mb-2">
        &copy; 2025 Nchito. All rights reserved.
    </div>
    <div>
        <p>Contact us: <a href="mailto:support@nchito.com" class="text-blue-400 underline">support@nchito.com</a></p>
        <p>Phone: <a href="tel:+260960939135" class="text-blue-400 underline">0960939135</a></p>
    </div>
</footer>


</body>
</html>

<?php /**PATH C:\xampp\htdocs\job-listing\resources\views/layouts/app.blade.php ENDPATH**/ ?>