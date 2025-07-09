

<?php $__env->startSection('title', 'Messages'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto p-6 bg-white shadow rounded">

    <h2 class="text-2xl font-semibold mb-6">Select a User to Chat With</h2>

    <ul class="divide-y divide-gray-200">
        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <li class="py-3 flex justify-between items-center hover:bg-gray-100 rounded px-3">
                <div>
                    <a href="<?php echo e(route('messages.show', $user->id)); ?>" class="text-blue-600 hover:underline">
                        <?php echo e($user->company?->name ?? $user->name); ?>

                    </a>
                    <p class="text-sm text-gray-500">Role: <?php echo e(ucfirst($user->role ?? 'N/A')); ?></p>
                </div>
                <div>
                    <!-- Optional: show unread count here -->
                </div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <li>No users found.</li>
        <?php endif; ?>
    </ul>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\job-listing\resources\views/messages/index.blade.php ENDPATH**/ ?>