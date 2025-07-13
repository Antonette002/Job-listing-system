<?php $__env->startSection('title', 'Job Listings'); ?>
<?php $__env->startSection('header-title', 'Manage Jobs'); ?>

<?php $__env->startSection('sidebar'); ?>
    <nav class="w-80 bg-[#1e293b] text-white py-6 px-4 flex flex-col gap-2 min-h-[calc(100vh-64px)]">
        <a href="<?php echo e(route('companies.dashboard')); ?>"
           class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">
            🏠 <span>Dashboard</span>
        </a>

        <a href="<?php echo e(route('jobs.index')); ?>"
           class="flex items-center gap-2 px-3 py-2 rounded-md bg-[#162139]">
            📋 <span>Manage Jobs</span>
        </a>

        <a href="<?php echo e(route('messages.index')); ?>"
           class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">
            💬 <span>Messages</span>
        </a>

        <a href="<?php echo e(route('feedbacks.index')); ?>"
           class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">
            ⭐ <span>Feedback</span>
        </a>

        <a href="<?php echo e(route('company.settings')); ?>"
           class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">
            ⚙️ <span>Settings</span>
        </a>
    </nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold text-blue-800 mb-8 text-center">All Job Listings</h2>

    <?php if($jobs->count() > 0): ?>
        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white border border-blue-900 rounded-xl shadow-md p-6 flex flex-col justify-between">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800"><?php echo e($job->title); ?></h3>
                        <p class="text-gray-600 text-sm mt-1"><?php echo e(Str::limit($job->description, 120)); ?></p>
                        <p class="mt-2 text-sm text-gray-500">Company: <span class="text-blue-700"><?php echo e($job->company->name); ?></span></p>
                    </div>

                    <div class="flex justify-between items-center mt-6">
                        <a href="<?php echo e(route('jobs.show', $job->id)); ?>"
                           class="text-sm text-blue-700 hover:underline font-medium">
                            🔍 View Details
                        </a>

                        <div class="flex gap-2">
                            <a href="<?php echo e(route('jobs.edit', $job->id)); ?>"
                               class="px-3 py-1 bg-orange-500 text-white text-sm rounded hover:bg-orange-600 transition">
                                ✏️ Edit
                            </a>

                            <form action="<?php echo e(route('jobs.destroy', $job->id)); ?>" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this job?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit"
                                        class="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700 transition">
                                    🗑️ Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <p class="text-center text-gray-500">No jobs found.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\job-listing\resources\views/jobs/index.blade.php ENDPATH**/ ?>