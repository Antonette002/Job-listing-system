

<?php $__env->startSection('Messages', 'Chat with ' . ($chatUser->company?->name ?? $chatUser->applicant?->full_name ?? $chatUser->name)); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto bg-white shadow rounded overflow-hidden flex flex-col h-[80vh]">

    <!-- Header -->
    <div class="bg-blue-600 text-white px-4 py-3">
        <h2>
    <?php if(auth()->user()->role === 'company'): ?>
        Select an Applicant to Chat With
    <?php elseif(auth()->user()->role === 'applicant'): ?>
        Select a Company to Chat With
    <?php else: ?>
        Select a User to Chat With
    <?php endif; ?>
</h2>

    </div>

    <!-- Messages container -->
    <div id="messages" class="flex-1 overflow-y-auto p-4 space-y-2 bg-gray-100">
        <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="flex <?php echo e($message->sender_id === auth()->id() ? 'justify-end' : 'justify-start'); ?>">
                <div class="relative max-w-xs md:max-w-sm px-4 py-2 rounded-lg shadow 
                    <?php echo e($message->sender_id === auth()->id() ? 'bg-blue-500 text-white' : 'bg-white text-gray-800'); ?>">
                    <p class="text-sm"><?php echo e($message->content); ?></p>
                    <small class="block text-xs mt-1 text-gray-300">
                        <?php echo e($message->created_at->format('H:i')); ?>

                    </small>

                    <!-- Reply and Delete -->
                    <?php if($message->sender_id === auth()->id()): ?>
                        <form action="<?php echo e(route('messages.destroy', $message->id)); ?>" method="POST" class="absolute top-1 right-1">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="text-xs text-red-400 hover:text-red-600">🗑️</button>
                        </form>
                    <?php endif; ?>

                    <!-- Reply (for all messages) -->
                    <button 
                        onclick="document.getElementById('message-input').value = 'Re: <?php echo e($message->content); ?>'; document.getElementById('message-input').focus();"
                        class="absolute bottom-1 right-1 text-xs text-green-600 hover:text-green-800"
                    >↩️</button>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- Form -->
    <form action="<?php echo e(route('messages.store')); ?>" method="POST" class="flex gap-2 p-4 border-t bg-white">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="receiver_id" value="<?php echo e($chatUser->id); ?>">
        <input 
            type="text" 
            name="content" 
            id="message-input"
            class="flex-grow border rounded p-2 focus:outline-blue-500" 
            placeholder="Type a message..." 
            required
        >
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Send</button>
    </form>
</div>

<!-- Auto scroll -->
<script>
    window.onload = () => {
        const box = document.getElementById('messages');
        box.scrollTop = box.scrollHeight;
    };
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\job-listing\resources\views/messages/show.blade.php ENDPATH**/ ?>