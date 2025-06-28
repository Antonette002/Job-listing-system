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

        <form method="POST" action="{{ route('company.register') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-700 focus:outline-none">
                @error('email')
                    <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-700 focus:outline-none">
                @error('password')
                    <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-700 focus:outline-none">
                @error('password_confirmation')
                    <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <!-- Company Name -->
            <div class="mb-4">
                <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name</label>
                <input id="company_name" type="text" name="company_name" value="{{ old('company_name') }}" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-700 focus:outline-none">
                @error('company_name')
                    <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                @enderror
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

    @error('industry')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>


            <!-- Logo Path -->
            <div class="mb-4">
                <label for="logo_path" class="block text-sm font-medium text-gray-700">Logo Path (optional)</label>
                <input id="logo_path" type="text" name="logo_path" value="{{ old('logo_path') }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-700 focus:outline-none">
                @error('logo_path')
                    <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" rows="4"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-700 focus:outline-none">{{ old('description') }}</textarea>
                @error('description')
                    <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit and Already Registered -->
            <div class="flex items-center justify-between mt-6">
                <a class="text-sm text-gray-600 hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-700" href="{{ route('company.login') }}">
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
