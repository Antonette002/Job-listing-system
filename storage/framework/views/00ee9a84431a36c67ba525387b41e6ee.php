

<?php $__env->startSection('title', 'My Application'); ?>
<?php $__env->startSection('header-title', 'My Application'); ?>

<?php $__env->startSection('sidebar'); ?>
    <nav class="w-80 bg-[#1e293b] text-white p-4 flex flex-col min-h-[calc(100vh-64px)]">
        <a href="<?php echo e(route('applicant.dashboard')); ?>" class="block p-2 rounded hover:bg-[#162139]">🏠 Dashboard</a>
        <a href="<?php echo e(route('applications.show', $application->id)); ?>" class="block p-2 rounded hover:bg-[#162139] bg-[#162139]">📄 My Application</a>
        <a href="<?php echo e(route('feedbacks.index')); ?>" class="block p-2 rounded hover:bg-[#162139]">⭐ Feedback</a>
    </nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-8 space-y-6 border-l-4 border-[#1e2a47]">

        <h2 class="text-3xl font-bold text-[#1e2a47] mb-4">Application for: <?php echo e($application->job->title); ?></h2>

        <div class="space-y-2">
            <p class="text-gray-700"><strong>Company:</strong> <?php echo e($application->job->company->name ?? 'N/A'); ?></p>
            <p class="text-gray-700"><strong>Location:</strong> <?php echo e($application->job->location); ?></p>
            <p class="text-gray-700"><strong>Employment Type:</strong> <?php echo e($application->job->employment_type); ?></p>
            <p class="text-gray-700"><strong>Applied On:</strong> <?php echo e($application->created_at->format('M d, Y')); ?></p>
        </div>

        <hr class="my-4 border-gray-300">

        <div class="space-y-4">
            <h3 class="text-xl font-semibold text-[#1e2a47]">Status</h3>
            <p class="text-lg">
                <?php switch($application->status):
                    case ('accepted'): ?>
                        <span class="text-green-600 font-semibold bg-green-100 px-3 py-1 rounded-full">Accepted</span>
                        <?php break; ?>
                    <?php case ('rejected'): ?>
                        <span class="text-red-600 font-semibold bg-red-100 px-3 py-1 rounded-full">Rejected</span>
                        <?php break; ?>
                    <?php default: ?>
                        <span class="text-yellow-600 font-semibold bg-yellow-100 px-3 py-1 rounded-full">Pending</span>
                <?php endswitch; ?>
            </p>
        </div>

        <div class="mt-6 space-y-3">
            <h3 class="text-xl font-semibold text-[#1e2a47]">Submitted Documents</h3>

            <?php if($application->cv_path): ?>
                <a href="<?php echo e(asset('storage/' . $application->cv_path)); ?>" target="_blank"
                   class="block text-blue-700 hover:underline">
                    📄 View CV
                </a>
            <?php endif; ?>

            <?php if($application->cover_letter): ?>
                <a href="<?php echo e(asset('storage/' . $application->cover_letter)); ?>" target="_blank"
                   class="block text-blue-700 hover:underline">
                    📝 View Cover Letter
                </a>
            <?php endif; ?>

            <?php if($application->portfolio_path): ?>
                <a href="<?php echo e(asset('storage/' . $application->portfolio_path)); ?>" target="_blank"
                   class="block text-blue-700 hover:underline">
                    📁 View Portfolio
                </a>
            <?php endif; ?>
        </div>

        <div class="mt-8 text-sm text-gray-500">
            If your application is accepted, you will be notified with feedback.
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\job-listing\resources\views/applications/show.blade.php ENDPATH**/ ?>