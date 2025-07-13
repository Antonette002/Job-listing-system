@extends('layouts.app')

@section('title', 'Edit Job')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow p-6 mt-8 rounded">
    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Edit Job: {{ $job->title }}</h2>

    <form action="{{ route('jobs.update', $job->id) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Job Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $job->title) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Job Description</label>
            <textarea name="description" id="description" rows="4" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $job->description) }}</textarea>
            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Location -->
        <div>
            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
            <input type="text" name="location" id="location" value="{{ old('location', $job->location) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('location') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Employment Type -->
        <div>
            <label for="employment_type" class="block text-sm font-medium text-gray-700">Employment Type</label>
            <select name="employment_type" id="employment_type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @foreach(['Full-time', 'Part-time', 'Internship', 'Remote'] as $type)
                    <option value="{{ $type }}" {{ old('employment_type', $job->employment_type) == $type ? 'selected' : '' }}>{{ $type }}</option>
                @endforeach
            </select>
            @error('employment_type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Application Deadline -->
        <div>
            <label for="application_deadline" class="block text-sm font-medium text-gray-700">Application Deadline</label>
            <input type="date" name="application_deadline" id="application_deadline" value="{{ old('application_deadline', date('Y-m-d', strtotime($job->application_deadline))) }}"
 " required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('application_deadline') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Qualifications -->
        <div>
            <label for="qualifications" class="block text-sm font-medium text-gray-700">Qualifications</label>
            <textarea name="qualifications" id="qualifications" rows="3" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('qualifications', $job->qualifications) }}</textarea>
            @error('qualifications') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Responsibilities -->
        <div>
            <label for="responsibilities" class="block text-sm font-medium text-gray-700">Responsibilities</label>
            <textarea name="responsibilities" id="responsibilities" rows="3" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('responsibilities', $job->responsibilities) }}</textarea>
            @error('responsibilities') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Submit -->
        <div class="text-right">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update Job
            </button>
        </div>
    </form>
</div>
@endsection
