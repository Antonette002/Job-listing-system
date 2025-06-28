<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Company - Nchito</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4 py-12">

    <div class="w-full max-w-2xl bg-white p-8 rounded shadow">

        <h2 class="text-2xl font-bold text-blue-900 mb-6">Register Company</h2>

        <form method="POST" action="<?php echo e(route('company.register')); ?>">
            <?php echo csrf_field(); ?>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="username"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-700 focus:outline-none">
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
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-700 focus:outline-none">
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

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-700 focus:outline-none">
                <?php $__errorArgs = ['password_confirmation'];
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

            <!-- Company Name -->
            <div class="mb-4">
                <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name</label>
                <input id="company_name" type="text" name="company_name" value="<?php echo e(old('company_name')); ?>" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-700 focus:outline-none">
                <?php $__errorArgs = ['company_name'];
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

    <!-- Industry  -->
<div class="mb-4">
    <label for="industry" class="block text-sm font-medium text-gray-700">Industry</label>
    <input list="industry-options" id="industry" name="industry"
        class="mt-1 block w-full rounded-md border border-gray-300 px-4 py-2 shadow-sm focus:border-blue-700 focus:ring-2 focus:ring-blue-600 focus:outline-none"
        placeholder="e.g. Information Technology, Agriculture, etc.">

    <datalist id="industry-options">
        <option value="Information Technology">
        <option value="Healthcare">
        <option value="Education">
        <option value="Finance">
        <option value="Agriculture">
        <option value="Manufacturing">
        <option value="Construction">
        <option value="Mining">
        <option value="Energy">
        <option value="Retail and Trade">
        <option value="Transport and Logistics">
        <option value="Telecommunications">
        <option value="Hospitality and Tourism">
        <option value="Media and Communications">
        <option value="Legal Services">
        <option value="Real Estate">
        <option value="Non-Profit and NGOs">
        <option value="Government">
    </datalist>

    <?php $__errorArgs = ['industry'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>


            <!-- Logo Path -->
            <div class="mb-4">
                <label for="logo_path" class="block text-sm font-medium text-gray-700">Logo Path (optional)</label>
                <input id="logo_path" type="text" name="logo_path" value="<?php echo e(old('logo_path')); ?>"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-700 focus:outline-none">
                <?php $__errorArgs = ['logo_path'];
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

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" rows="4"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-700 focus:outline-none"><?php echo e(old('description')); ?></textarea>
                <?php $__errorArgs = ['description'];
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

            <!-- Submit and Already Registered -->
            <div class="flex items-center justify-between mt-6">
                <a class="text-sm text-gray-600 hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-700" href="<?php echo e(route('company.login')); ?>">
                    Already registered?
                </a>

                <button type="submit"
                    class="px-4 py-2 bg-blue-900 text-white text-sm font-medium rounded-md hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-700">
                    Register Company
                </button>
            </div>

        </form>
    </div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\job-listing\resources\views/companies/register.blade.php ENDPATH**/ ?>