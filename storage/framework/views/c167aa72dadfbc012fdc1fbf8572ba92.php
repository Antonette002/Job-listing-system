


<?php $__env->startSection('title', 'Messages'); ?>
<?php $__env->startSection('header-title', 'Messages'); ?>

<?php $__env->startSection('sidebar'); ?>
<nav class="w-80 bg-[#1e293b] text-white py-6 px-4 flex flex-col gap-2 min-h-[calc(100vh-64px)]">
    <a href="<?php echo e(route('applicant.dashboard')); ?>" class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">🏠 Dashboard</a>
    <a href="<?php echo e(route('messages.index')); ?>" class="flex items-center gap-2 px-3 py-2 rounded-md bg-[#162139]">💬 Messages</a>
    <a href="<?php echo e(route('feedbacks.index')); ?>" class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">⭐ Feedback</a>
</nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto bg-white shadow rounded p-6 space-y-6">

    <h2 class="text-2xl font-semibold text-blue-900 border-b pb-2">
        <?php if(auth()->user()->role === 'applicant'): ?>
            Select a Company to Chat With
        <?php elseif(auth()->user()->role === 'company'): ?>
            Select an Applicant to Chat With
        <?php else: ?>
            Select a User to Chat With
        <?php endif; ?>
    </h2>

    <ul class="divide-y divide-gray-200">
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <a href="<?php echo e(route('messages.show', $user->id)); ?>"
                   class="flex items-center justify-between py-3 px-4 hover:bg-blue-50 rounded transition group">
                    <div class="flex items-center gap-3">
                        <span class="text-2xl">
                            <?php if($user->role === 'company'): ?> 💼 <?php else: ?> 👤 <?php endif; ?>
                        </span>
                        <span class="text-gray-800 font-medium group-hover:text-blue-800">
                            <?php if($user->role === 'company' && isset($user->company)): ?>
                                <?php echo e($user->company->name ?? 'Company'); ?>

                            <?php elseif($user->role === 'applicant' && isset($user->applicant)): ?>
                                <?php echo e($user->applicant->full_name ?? 'Applicant'); ?>

                            <?php else: ?>
                                Unknown
                            <?php endif; ?>
                        </span>
                    </div>
                    <span class="text-sm text-gray-400 group-hover:text-blue-500">→</span>
                </a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\job-listing\resources\views/messages/index.blade.php ENDPATH**/ ?>