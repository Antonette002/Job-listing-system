@extends('layouts.app')

@section('title', 'Company Settings')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow p-6 mt-8 rounded">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Company Settings</h2>
        <form method="POST" action="{{ route('company.logout') }}">
            @csrf
            <button type="submit" class="text-red-600 hover:underline text-sm">Logout</button>
        </form>
    </div>

    <form action="{{ route('companies.update', $company->id) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <!-- Company Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Company Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $company->name) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Industry -->
        <div>
            <label for="industry" class="block text-sm font-medium text-gray-700">Industry</label>
            <input type="text" name="industry" id="industry" value="{{ old('industry', $company->industry) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('industry') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $company->user->email) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Logo Path (optional) -->
        <div>
            <label for="logo_path" class="block text-sm font-medium text-gray-700">Logo Path</label>
            <input type="text" name="logo_path" id="logo_path" value="{{ old('logo_path', $company->logo_path) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('logo_path') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Company Description</label>
            <textarea name="description" id="description" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $company->description) }}</textarea>
            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <!-- Save Changes -->
        <div class="text-right">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection
