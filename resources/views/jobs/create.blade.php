<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post Job</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Post a Job</h2>

        @if (session('success'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('jobs.store') }}">
            @csrf

            <!-- Job Title -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Job Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                    class="mt-1 block w-full px-4 py-2 border border-blue-500 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                @error('title')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="3" required
                    class="mt-1 block w-full px-4 py-2 border border-blue-500 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Location -->
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                <input type="text" name="location" id="location" value="{{ old('location') }}" required
                    class="mt-1 block w-full px-4 py-2 border border-blue-500 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                @error('location')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Employment Type -->
            <div class="mb-4">
                <label for="employment_type" class="block text-sm font-medium text-gray-700">Employment Type</label>
                <select name="employment_type" id="employment_type" required
                    class="mt-1 block w-full px-4 py-2 border border-blue-500 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                    <option value="">-- Select --</option>
                    @foreach(['Full-time', 'Part-time', 'Internship', 'Remote'] as $type)
                        <option value="{{ $type }}" {{ old('employment_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
                @error('employment_type')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Application Deadline -->
            <div class="mb-4">
                <label for="application_deadline" class="block text-sm font-medium text-gray-700">Application Deadline</label>
                <input type="date" name="application_deadline" id="application_deadline" value="{{ old('application_deadline') }}" required
                    class="mt-1 block w-full px-4 py-2 border border-blue-500 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                @error('application_deadline')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Qualifications -->
            <div class="mb-4">
                <label for="qualifications" class="block text-sm font-medium text-gray-700">Qualifications</label>
                <textarea name="qualifications" id="qualifications" rows="3" required
                    class="mt-1 block w-full px-4 py-2 border border-blue-500 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600">{{ old('qualifications') }}</textarea>
                @error('qualifications')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Responsibilities -->
            <div class="mb-6">
                <label for="responsibilities" class="block text-sm font-medium text-gray-700">Responsibilities</label>
                <textarea name="responsibilities" id="responsibilities" rows="3" required
                    class="mt-1 block w-full px-4 py-2 border border-blue-500 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600">{{ old('responsibilities') }}</textarea>
                @error('responsibilities')
                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit -->
            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 bg-blue-900 text-white text-sm font-medium rounded-md hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-blue-600">
                    Post Job
                </button>
            </div>
        </form>
    </div>

</body>
</html>
