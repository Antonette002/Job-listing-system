<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Applicant Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
    <form method="POST" action="{{ route('applicant.register') }}">
        @csrf

        <!-- Full Name -->
        <div class="mt-4">
            <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
            <input id="full_name"
                   class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-700"
                   type="text"
                   name="full_name"
                   value="{{ old('full_name') }}"
                   required
                   autofocus
                   autocomplete="name"
                   spellcheck="false" />
            @error('full_name')
                <div class="mt-2 text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <!-- Location -->
        <div class="mt-4">
            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
            <input id="location"
                   class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-700"
                   type="text"
                   name="location"
                   value="{{ old('location') }}"
                   autocomplete="address-level1" />
            @error('location')
                <div class="mt-2 text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email"
                   class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-700"
                   type="email"
                   name="email"
                   value="{{ old('email') }}"
                   required
                   autocomplete="username" />
            @error('email')
                <div class="mt-2 text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input id="password"
                   class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-700"
                   type="password"
                   name="password"
                   required
                   autocomplete="new-password" />
            @error('password')
                <div class="mt-2 text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input id="password_confirmation"
                   class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-700"
                   type="password"
                   name="password_confirmation"
                   required
                   autocomplete="new-password" />
            @error('password_confirmation')
                <div class="mt-2 text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
            <input id="phone"
                   class="block mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-700"
                   type="text"
                   name="phone"
                   value="{{ old('phone') }}" />
            @error('phone')
                <div class="mt-2 text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
               href="{{ route('applicant.login') }}">
                Already registered?
            </a>

            <button type="submit"
                    class="ms-4 px-4 py-2 bg-blue-900 text-white rounded-md hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-700">
                Register
            </button>
        </div>
    </form>
</div>

</body>
</html>


