<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Your Feedback</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">
    <div class="max-w-3xl w-full bg-white rounded shadow p-6">
        <h1 class="text-3xl font-bold mb-6 text-center text-blue-700">Your Feedback</h1>

        <?php if($feedbacks->count() > 0): ?>
            <div class="space-y-4">
                <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="p-4 bg-blue-50 rounded shadow border-l-4 
                        <?php if(Str::contains(strtolower($feedback->message), 'accepted')): ?> border-green-500
                        <?php elseif(Str::contains(strtolower($feedback->message), 'rejected')): ?> border-red-500
                        <?php else: ?> border-blue-400
                        <?php endif; ?>
                    ">
                        <p class="text-gray-800"><?php echo e($feedback->message); ?></p>

                        <?php if($feedback->rating): ?>
                            <p class="text-yellow-600 text-sm mt-1">Rating: <?php echo e($feedback->rating); ?>/5</p>
                        <?php endif; ?>

                        <small class="text-gray-500 italic block mt-2"><?php echo e($feedback->created_at->diffForHumans()); ?></small>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="mt-6">
                <?php echo e($feedbacks->links()); ?>

            </div>
        <?php else: ?>
            <p class="text-center text-gray-500 italic">No feedback available yet.</p>
        <?php endif; ?>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\job-listing\resources\views/feedbacks/index.blade.php ENDPATH**/ ?>