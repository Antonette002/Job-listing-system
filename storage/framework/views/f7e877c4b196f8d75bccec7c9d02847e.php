<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>
    <link href="<?php echo e(asset('css/output.css')); ?>" rel="stylesheet">
</head>
<body class="bg-gray-200">
    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-bold text-center text-blue-600 mb-6">Job Listings</h1>

        <?php if($jobs->count() > 0): ?>
            <div class="space-y-4">
                <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <h2 class="text-2xl font-semibold text-gray-800"><?php echo e($job->title); ?></h2>
                        <p class="text-gray-600"><?php echo e($job->description); ?></p>
                        <p class="mt-2 text-gray-500">Company: <?php echo e($job->company->name); ?></p>
                        <a href="#" class="text-blue-500 hover:text-blue-700 mt-4 inline-block">View Details</a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <p class="text-center text-gray-500">No job listings available at the moment.</p>
        <?php endif; ?>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\job-listing\resources\views/jobs/index.blade.php ENDPATH**/ ?>