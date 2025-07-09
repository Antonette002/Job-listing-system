

<?php $__env->startSection('title', 'Chat with ' . ($chatUser->company?->name ?? $chatUser->name)); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto p-6 bg-white shadow rounded space-y-6">

    <h2 class="text-xl font-semibold mb-4">
        Chat with <?php echo e($chatUser->company?->name ?? $chatUser->name); ?>

    </h2>

    <div class="border rounded p-4 h-[400px] overflow-y-auto space-y-2 bg-gray-50">
        <?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="flex <?php echo e($message->sender_id === auth()->id() ? 'justify-end' : 'justify-start'); ?>">
                <div class="max-w-xs px-4 py-2 rounded-lg 
                    <?php echo e($message->sender_id === auth()->id() ? 'bg-blue-500 text-white' : 'bg-gray-200 text-black'); ?>">
                    <?php echo e($message->content); ?>

                    <div class="text-xs mt-1 text-right opacity-75">
                        <?php echo e($message->created_at->format('M d, H:i')); ?>

                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-center text-gray-500">No messages yet.</p>
        <?php endif; ?>
    </div>

    <form action="<?php echo e(route('messages.store')); ?>" method="POST" class="flex gap-2">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="receiver_id" value="<?php echo e($chatUser->id); ?>">
        <input 
            type="text" 
            name="content" 
            placeholder="Type your message..." 
            class="flex-grow border rounded p-2 focus:outline-none focus:ring" 
            required
        >
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Send
        </button>
    </form>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\job-listing\resources\views/messages/show.blade.php ENDPATH**/ ?>