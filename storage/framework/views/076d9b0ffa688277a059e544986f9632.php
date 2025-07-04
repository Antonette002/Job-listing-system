

<?php $__env->startSection('title', 'Applicant Dashboard'); ?>
<?php $__env->startSection('header-title', 'Applicant Dashboard'); ?>

<?php $__env->startSection('sidebar'); ?>
    <nav class="w-80 bg-[#1e293b] text-white p-4 flex flex-col justify-content min-h-[calc(100vh-64px)]">
        <a href="<?php echo e(route('applicant.dashboard')); ?>" class="block p-2 rounded hover:bg-[#162139]">🏠 Dashboard</a>
        <?php if($application): ?>
    <a href="<?php echo e(route('applications.show', $application->id)); ?>" class="...">
        📄 My Application
    </a>
<?php endif; ?>

         <a href="<?php echo e(route('messages.index')); ?>" class="block p-2 rounded hover:bg-[#162139]">💬 Messages</a>
        <a href="<?php echo e(route('feedbacks.index')); ?>" class="block p-2 rounded hover:bg-[#162139]">⭐ Feedback</a>
    </nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('applicant.logout')); ?>" class="mb-6">
        <?php echo csrf_field(); ?>
        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-sm font-semibold px-4 py-2 rounded">
            Logout
        </button>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Jobs -->
        <div class="bg-blue-900 text-white p-4 rounded-xl shadow">
            <div class="text-2xl font-bold"><?php echo e($totalJobs ?? 0); ?></div>
            <div class="text-sm mt-1">Jobs</div>
        </div>

        <!-- Messages -->
        <div class="bg-blue-700 text-white p-4 rounded-xl shadow">
            <div class="text-2xl font-bold"><?php echo e($totalMessages ?? 0); ?></div>
            <div class="text-sm mt-1">Messages</div>
        </div>

        <!-- Feedback -->
        <div class="bg-orange-500 text-white p-4 rounded-xl shadow">
            <div class="text-2xl font-bold"><?php echo e($totalFeedback ?? 0); ?></div>
            <div class="text-sm mt-1">Feedback</div>
        </div>
    </div>

    
<!-- Job Cards -->
<div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3 mt-6">
    <?php $__empty_1 = true; $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-lg transition duration-200 p-6 flex flex-col justify-between">
            <div class="space-y-2">
                <h3 class="text-lg font-semibold text-[#1e2a47]"><?php echo e($job->title); ?></h3>
                <p class="text-gray-600 text-sm"><?php echo e(Str::limit($job->description, 100)); ?></p>

                <div class="flex flex-wrap gap-4 mt-3 text-sm text-gray-500">
                    <span class="flex items-center gap-1">📍 <?php echo e($job->location); ?></span>
                    <span class="flex items-center gap-1">🕒 <?php echo e(\Carbon\Carbon::parse($job->application_deadline)->format('M d, Y')); ?></span>
                    <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs font-semibold">
                        <?php echo e($job->employment_type); ?>

                    </span>
                </div>
            </div>

            <div class="flex gap-3 mt-6">
                <a href="<?php echo e(route('jobs.show', $job->id)); ?>"
                   class="bg-[#1e2a47] text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-[#162139] transition">
                    View Details
                </a>
                <a href="<?php echo e(route('applications.create', ['job_id' => $job->id])); ?>"
                   class="bg-orange-500 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-orange-600 transition">
                    Apply
                </a>
            </div>
        </div>
 
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-gray-500">No jobs available at the moment.</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\job-listing\resources\views/applicants/dashboard.blade.php ENDPATH**/ ?>