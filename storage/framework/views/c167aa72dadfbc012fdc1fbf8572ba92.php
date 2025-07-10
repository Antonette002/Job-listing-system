

<?php $__env->startSection('title', 'Messages'); ?>

<?php $__env->startSection('content'); ?>
<div class="flex flex-col gap-6 p-6">

  <h2 class="text-2xl font-semibold mb-6">
    <?php if(auth()->user()->role === 'applicant'): ?>
        Select a company to chat with
    <?php elseif(auth()->user()->role === 'company'): ?>
        Select an applicant to chat with
    <?php else: ?>
        Select a user to chat with
    <?php endif; ?>
</h2>


    <ul class="bg-white shadow rounded divide-y divide-gray-200 overflow-hidden">
   <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route('messages.show', $user->id)); ?>" class="flex items-center gap-2 py-2 px-3 hover:bg-gray-100 rounded">
        
        
        <span class="text-gray-500">
            <?php if($user->role === 'company'): ?>
                💼
            <?php else: ?>
                👤
            <?php endif; ?>
        </span>

        
        <span class="font-medium">
            <?php if($user->role === 'company' && isset($user->company)): ?>
                <?php echo e($user->company->name ?? 'Company'); ?>

            <?php elseif($user->role === 'applicant' && isset($user->applicant)): ?>
                <?php echo e($user->applicant->full_name ?? 'Applicant'); ?>

            <?php else: ?>
                Unknown
            <?php endif; ?>
        </span>
    </a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


      
    </ul>

</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\job-listing\resources\views/messages/index.blade.php ENDPATH**/ ?>