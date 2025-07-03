<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Applications</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Using Tailwind CDN for styling -->
</head>
<body class="bg-gray-200">
    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-bold text-center text-navy-900 mb-6 text-[#1e3a8a]">Applications</h1>

        <?php if($applications->count() > 0): ?>
            <div class="space-y-4">
                <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white p-4 rounded-lg shadow-md grid grid-rows-2 gap-4">

                        
                        <div>
                            <h2 class="text-2xl font-semibold text-gray-800"><?php echo e($application->applicant->full_name); ?></h2>
                            <p class="text-gray-600">Applicant Location: <?php echo e($application->applicant->location); ?></p>
                            <p class="mt-2 text-gray-500">Job Title: <?php echo e($application->job->title); ?></p>

                            <p class="mt-2 text-gray-500">
                                CV:
                                <?php if($application->cv_path): ?>
                                    <a href="<?php echo e(asset('storage/' . $application->cv_path)); ?>" target="_blank" class="text-[#1e40af] hover:underline">
                                        Download CV
                                    </a>
                                <?php else: ?>
                                    <span class="text-gray-400">Not uploaded</span>
                                <?php endif; ?>
                            </p>

                            <p class="mt-2 text-gray-500">
                                Cover Letter:
                                <?php if($application->cover_letter): ?>
                                    <a href="<?php echo e(asset('storage/' . $application->cover_letter)); ?>" target="_blank" class="text-[#1e40af] hover:underline">
                                        Download Cover Letter
                                    </a>
                                <?php else: ?>
                                    <span class="text-gray-400">Not uploaded</span>
                                <?php endif; ?>
                            </p>

                            <p class="mt-2 text-gray-500">
                                Status:
                                <?php if($application->status === 'accepted'): ?>
                                    <span class="font-semibold text-green-600">Accepted</span>
                                <?php elseif($application->status === 'rejected'): ?>
                                    <span class="font-semibold text-red-600">Rejected</span>
                                <?php else: ?>
                                    <span class="font-semibold text-yellow-600">Pending</span>
                                <?php endif; ?>
                            </p>
                        </div>

                        
                        <div class="flex space-x-3">
                            <form method="POST" action="<?php echo e(route('applications.updateStatus', [$application->id, 'accepted'])); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <button class="px-4 py-2 bg-[#1e40af] text-white rounded hover:bg-[#1e3a8a] text-sm">
                                    Accept
                                </button>
                            </form>

                            <form method="POST" action="<?php echo e(route('applications.updateStatus', [$application->id, 'rejected'])); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <button class="px-4 py-2 bg-[#1e40af] text-white rounded hover:bg-[#1e3a8a] text-sm">
                                    Reject
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <p class="text-center text-gray-500">No application available at the moment.</p>
        <?php endif; ?>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\job-listing\resources\views/applications/index.blade.php ENDPATH**/ ?>