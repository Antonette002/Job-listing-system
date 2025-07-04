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
   
</form>

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
    <footer class="bg-gray-800 text-white p-4 text-center">
        &copy; 2025 Nchito. All rights reserved.
    </footer>

</body>
</html>

<?php /**PATH C:\xampp\htdocs\job-listing\resources\views/layouts/app.blade.php ENDPATH**/ ?>