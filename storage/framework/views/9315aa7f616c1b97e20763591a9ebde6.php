<!-- Session Status -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Company Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Company Login</h2>

        <?php if(session('status')): ?>
            <div class="mb-4 font-medium text-sm text-green-600">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('company.login')); ?>">
            <?php echo csrf_field(); ?>

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus autocomplete="username"
                    class="mt-1 block w-full px-4 py-2 border border-blue-500 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="mt-2 text-sm text-red-600"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="mt-1 block w-full px-4 py-2 border border-blue-500 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="mt-2 text-sm text-red-600"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mb-4">
                <input id="remember_me" type="checkbox" name="remember"
                    class="rounded border-gray-300 text-blue-900 shadow-sm focus:ring-blue-600">
                <label for="remember_me" class="ml-2 text-sm text-gray-600">Remember me</label>
            </div>

            <div class="flex items-center justify-between">
                <?php if(Route::has('password.request')): ?>
                    <a class="text-sm text-blue-900 hover:underline" href="<?php echo e(route('password.request')); ?>">
                        Forgot your password?
                    </a>
                <?php endif; ?>

                <button type="submit"
                    class="px-4 py-2 bg-blue-900 text-white text-sm font-medium rounded-md hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-blue-600">
                    Log in
                </button>
            </div>
        </form>

        <!-- Register Button -->
        <div class="mt-6 text-center">
            <span class="text-sm text-gray-600">Don't have an account?</span>
            <a href="<?php echo e(route('company.register')); ?>"
               class="ml-1 text-sm text-blue-900 font-medium hover:underline">
                Register
            </a>
        </div>
    </div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\job-listing\resources\views/companies/login.blade.php ENDPATH**/ ?>