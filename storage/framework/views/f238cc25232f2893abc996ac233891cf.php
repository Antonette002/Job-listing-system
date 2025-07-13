

<?php $__env->startSection('title', 'Edit Job'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto bg-white shadow p-6 mt-8 rounded">
    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Edit Job: <?php echo e($job->title); ?></h2>

    <form action="<?php echo e(route('jobs.update', $job->id)); ?>" method="POST" class="space-y-5">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <!-- Title -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Job Title</label>
            <input type="text" name="title" id="title" value="<?php echo e(old('title', $job->title)); ?>" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Job Description</label>
            <textarea name="description" id="description" rows="4" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"><?php echo e(old('description', $job->description)); ?></textarea>
            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <!-- Location -->
        <div>
            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
            <input type="text" name="location" id="location" value="<?php echo e(old('location', $job->location)); ?>" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <!-- Employment Type -->
        <div>
            <label for="employment_type" class="block text-sm font-medium text-gray-700">Employment Type</label>
            <select name="employment_type" id="employment_type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <?php $__currentLoopData = ['Full-time', 'Part-time', 'Internship', 'Remote']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($type); ?>" <?php echo e(old('employment_type', $job->employment_type) == $type ? 'selected' : ''); ?>><?php echo e($type); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['employment_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <!-- Application Deadline -->
        <div>
            <label for="application_deadline" class="block text-sm font-medium text-gray-700">Application Deadline</label>
            <input type="date" name="application_deadline" id="application_deadline" value="<?php echo e(old('application_deadline', date('Y-m-d', strtotime($job->application_deadline)))); ?>"
 " required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            <?php $__errorArgs = ['application_deadline'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <!-- Qualifications -->
        <div>
            <label for="qualifications" class="block text-sm font-medium text-gray-700">Qualifications</label>
            <textarea name="qualifications" id="qualifications" rows="3" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"><?php echo e(old('qualifications', $job->qualifications)); ?></textarea>
            <?php $__errorArgs = ['qualifications'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <!-- Responsibilities -->
        <div>
            <label for="responsibilities" class="block text-sm font-medium text-gray-700">Responsibilities</label>
            <textarea name="responsibilities" id="responsibilities" rows="3" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"><?php echo e(old('responsibilities', $job->responsibilities)); ?></textarea>
            <?php $__errorArgs = ['responsibilities'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <!-- Submit -->
        <div class="text-right">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update Job
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\job-listing\resources\views/jobs/edit.blade.php ENDPATH**/ ?>