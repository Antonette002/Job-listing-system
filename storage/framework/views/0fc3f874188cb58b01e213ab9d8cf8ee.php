<?php $__env->startSection('title', 'Settings'); ?>
<?php $__env->startSection('header-title', 'Settings'); ?>

<?php $__env->startSection('sidebar'); ?>
    <nav class="w-80 bg-[#1e293b] text-white py-6 px-4 flex flex-col gap-2 min-h-[calc(100vh-64px)]">
        <a href="<?php echo e(route('applicant.dashboard')); ?>"
           class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">
            🏠 <span>Dashboard</span>
        </a>

        <?php if($application ?? false): ?>
            <a href="<?php echo e(route('applications.show', $application->id)); ?>"
               class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">
                📄 <span>My Application</span>
            </a>
        <?php endif; ?>

        <a href="<?php echo e(route('messages.index')); ?>"
           class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">
            💬 <span>Messages</span>
        </a>

        <a href="<?php echo e(route('feedbacks.index')); ?>"
           class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">
            ⭐ <span>Feedback</span>
        </a>

        <a href="<?php echo e(route('applicants.edit', $applicant->id)); ?>"
           class="flex items-center gap-2 px-3 py-2 bg-[#162139] rounded-md transition-all">
            ⚙️ <span>Settings</span>
        </a>
    </nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="bg-white p-8 rounded-2xl shadow-md max-w-3xl w-full mb-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-blue-800">Update Profile</h2>

            <form method="POST" action="<?php echo e(route('applicant.logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm font-medium shadow">
                    Logout
                </button>
            </form>
        </div>

        <?php if(session('success')): ?>
            <div class="bg-green-100 border border-green-300 text-green-800 p-3 rounded-md mb-4">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

       <form method="POST" action="<?php echo e(route('applicants.update', $applicant->id)); ?>" class="space-y-5">

            <?php echo csrf_field(); ?>

            <div>
                <label class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="fullname" value="<?php echo e(old('fullname', $applicant->fullname)); ?>"
                       class="w-full border border-gray-300 rounded-md p-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <?php $__errorArgs = ['fullname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-red-500"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="text" name="phone" value="<?php echo e(old('phone', $applicant->phone)); ?>"
                       class="w-full border border-gray-300 rounded-md p-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-red-500"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="bg-blue-700 hover:bg-blue-800 text-white px-6 py-2 rounded-md font-medium shadow">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\job-listing\resources\views/applicants/settings.blade.php ENDPATH**/ ?>