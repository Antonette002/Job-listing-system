<?php $__env->startSection('title', 'Applications'); ?>
<?php $__env->startSection('header-title', 'View Applications'); ?>

<?php $__env->startSection('sidebar'); ?>
    <nav class="w-80 bg-[#1e293b] text-white py-6 px-4 flex flex-col gap-2 min-h-[calc(100vh-64px)]">
        <a href="<?php echo e(route('companies.dashboard')); ?>"
           class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">
            🏠 <span>Dashboard</span>
        </a>

        <a href="<?php echo e(route('jobs.index')); ?>"
           class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">
            📋 <span>Manage Jobs</span>
        </a>

        <a href="<?php echo e(route('applications.index')); ?>"
           class="flex items-center gap-2 px-3 py-2 rounded-md bg-[#162139]">
            📂 <span>Applications</span>
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
    <h2 class="text-3xl font-bold text-blue-900 mb-6 text-center">All Applications</h2>

    <?php if($applications->count() > 0): ?>
        <div class="space-y-6">
            <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white border border-blue-900 rounded-xl shadow-md p-6 grid gap-4">
                    <!-- Info -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800"><?php echo e($application->applicant->full_name); ?></h3>
                        <p class="text-gray-600 text-sm">📍 Location: <?php echo e($application->applicant->location); ?></p>
                        <p class="text-sm mt-1">💼 Job: <span class="text-blue-800"><?php echo e($application->job->title); ?></span></p>

                        <div class="mt-3 space-y-2 text-sm">
                            <p>
                                📄 CV:
                                <?php if($application->cv_path): ?>
                                    <a href="<?php echo e(asset('storage/' . $application->cv_path)); ?>" target="_blank"
                                       class="text-blue-600 hover:underline">Download CV</a>
                                <?php else: ?>
                                    <span class="text-gray-400">Not uploaded</span>
                                <?php endif; ?>
                            </p>
                            <p>
                                📝 Cover Letter:
                                <?php if($application->cover_letter): ?>
                                    <a href="<?php echo e(asset('storage/' . $application->cover_letter)); ?>" target="_blank"
                                       class="text-blue-600 hover:underline">Download Cover Letter</a>
                                <?php else: ?>
                                    <span class="text-gray-400">Not uploaded</span>
                                <?php endif; ?>
                            </p>
                            <p>
                                📌 Status:
                                <?php if($application->status === 'accepted'): ?>
                                    <span class="font-semibold text-green-600 bg-green-100 px-2 py-1 rounded-full">Accepted</span>
                                <?php elseif($application->status === 'rejected'): ?>
                                    <span class="font-semibold text-red-600 bg-red-100 px-2 py-1 rounded-full">Rejected</span>
                                <?php else: ?>
                                    <span class="font-semibold text-yellow-600 bg-yellow-100 px-2 py-1 rounded-full">Pending</span>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex gap-3 mt-2">
                        <form method="POST" action="<?php echo e(route('applications.updateStatus', [$application->id, 'accepted'])); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <button class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded text-sm">
                                ✅ Accept
                            </button>
                        </form>

                        <form method="POST" action="<?php echo e(route('applications.updateStatus', [$application->id, 'rejected'])); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded text-sm">
                                ❌ Reject
                            </button>
                        </form>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <p class="text-center text-gray-500">No applications available at the moment.</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\job-listing\resources\views/applications/index.blade.php ENDPATH**/ ?>