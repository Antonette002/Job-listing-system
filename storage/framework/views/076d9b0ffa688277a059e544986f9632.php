<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Dashboard</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="flex flex-col min-h-screen">

    <!-- Header -->
    <header class="bg-[#1e2a47] text-white p-4 shadow flex justify-between items-center">
        <h1 class="text-xl font-bold">Dashboard</h1>
    
    </header>

    <!-- Main Section: Sidebar + Main Content -->
    <div class="flex flex-1 bg-gray-50">

        <!-- Sidebar -->
        <nav class="w-64 bg-[#1e2a47] text-white p-4 space-y-2">
            <a href="<?php echo e(route('applicant.dashboard')); ?>" class="block p-2 rounded hover:bg-[#162139]">🏠 Dashboard</a>
            <a href="<?php echo e(route('applicants.index')); ?>" class="block p-2 rounded hover:bg-[#162139]">👥 Applicants</a>
            <a href="<?php echo e(route('applications.index')); ?>" class="block p-2 rounded hover:bg-[#162139]">📄 Applications</a>
            <a href="<?php echo e(route('messages.index')); ?>" class="block p-2 rounded hover:bg-[#162139]">💬 Messages</a>
            <a href="<?php echo e(route('feedbacks.index')); ?>" class="block p-2 rounded hover:bg-[#162139]">⭐ Feedback</a>
        </nav>

        <!-- Main Content -->
        <main class="flex-1 p-6 overflow-auto space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-6">
    <!-- Jobs -->
    <div class="bg-blue-500 text-white p-4 rounded-xl shadow">
        <div class="text-2xl font-bold"><?php echo e($totalJobs ?? 0); ?></div>
        <div class="text-sm mt-1">Jobs</div>
    </div>

    <!-- Messages -->
    <div class="bg-orange-500 text-white p-4 rounded-xl shadow">
        <div class="text-2xl font-bold"><?php echo e($totalMessages ?? 0); ?></div>
        <div class="text-sm mt-1">Messages</div>
    </div>

    <!-- Feedback -->
    <div class="bg-gray-600 text-white p-4 rounded-xl shadow">
        <div class="text-2xl font-bold"><?php echo e($totalFeedback ?? 0); ?></div>
        <div class="text-sm mt-1">Feedback</div>
    </div>
</div>


            <!-- Section Heading -->
            <h2 class="text-2xl font-bold text-[#1e2a47]">Available Jobs</h2>

            <!-- Job Cards -->
            <?php $__empty_1 = true; $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="bg-white p-6 rounded-xl shadow flex flex-col gap-3 border-l-4 border-[#1e2a47]">
                    <div class="flex flex-col md:flex-row justify-between md:items-center">
                        <div>
                            <h3 class="text-lg font-semibold text-[#1e2a47]"><?php echo e($job->title); ?></h3>
                            <p class="text-gray-700 mt-1"><?php echo e(Str::limit($job->description, 100)); ?></p>
                        </div>
                        <div class="text-sm text-gray-500 mt-3 md:mt-0 text-right">
                            <p><strong>Location:</strong> <?php echo e($job->location); ?></p>
                            <p><strong>Type:</strong> <?php echo e($job->employment_type); ?></p>
                            <p><strong>Deadline:</strong> <?php echo e(\Carbon\Carbon::parse($job->application_deadline)->format('M d, Y')); ?></p>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-4 mt-2">
                        <a href="<?php echo e(route('jobs.show', $job->id)); ?>"
                           class="bg-[#1e2a47] text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-[#162139] transition">
                            View Details
                        </a>
                        <a href="<?php echo e(route('applications.create', ['job_id' => $job->id])); ?>"
                           class="bg-orange-500 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-orange-600 transition">
                            Apply
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-gray-500">No jobs available at the moment.</p>
            <?php endif; ?>

        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-[#1e2a47] text-white p-4 text-center">
        &copy; 2025 Nchito. All rights reserved.
    </footer>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\job-listing\resources\views/applicants/dashboard.blade.php ENDPATH**/ ?>