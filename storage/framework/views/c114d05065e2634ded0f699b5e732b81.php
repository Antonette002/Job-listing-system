<?php $__env->startSection('title', 'Your Feedback'); ?>
<?php $__env->startSection('header-title', 'Feedback'); ?>

<?php $__env->startSection('sidebar'); ?>
<nav class="w-80 bg-[#1e293b] text-white py-6 px-4 flex flex-col gap-2 min-h-[calc(100vh-64px)]">
    <a href="<?php echo e(route('applicant.dashboard')); ?>" class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">🏠 Dashboard</a>
    <a href="<?php echo e(route('feedbacks.index')); ?>" class="flex items-center gap-2 px-3 py-2 rounded-md bg-[#162139]">⭐ Feedback</a>
    <a href="<?php echo e(route('messages.index')); ?>" class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">💬 Messages</a>
</nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-white rounded-lg shadow-lg p-8 border border-gray-200 max-w-4xl mx-auto">
    <h1 class="text-3xl font-extrabold mb-8 text-center text-blue-800 tracking-tight">Your Feedback</h1>

    <?php if($feedbacks->count() > 0): ?>
        <div class="space-y-6">
            <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div 
                    class="p-5 rounded-lg shadow-sm border-l-8 transition hover:shadow-md
                        <?php if(Str::contains(strtolower($feedback->message), 'accepted')): ?> border-green-500 bg-green-50
                        <?php elseif(Str::contains(strtolower($feedback->message), 'rejected')): ?> border-red-500 bg-red-50
                        <?php else: ?> border-blue-500 bg-blue-50
                        <?php endif; ?>">
                    <p class="text-gray-900 text-lg leading-relaxed"><?php echo e($feedback->message); ?></p>

                    <?php if($feedback->rating): ?>
                        <p class="mt-3 inline-block bg-yellow-200 text-yellow-800 text-sm font-semibold px-3 py-1 rounded-full select-none">
                            ⭐ Rating: <?php echo e($feedback->rating); ?>/5
                        </p>
                    <?php endif; ?>

                    <small class="block mt-4 text-gray-500 italic font-mono tracking-wide">
                        <?php echo e($feedback->created_at->diffForHumans()); ?>

                    </small>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="mt-10 flex justify-center">
            <?php echo e($feedbacks->links('pagination::tailwind')); ?>

        </div>
    <?php else: ?>
        <p class="text-center text-gray-500 italic text-lg mt-12">No feedback available yet.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\job-listing\resources\views/feedbacks/index.blade.php ENDPATH**/ ?>