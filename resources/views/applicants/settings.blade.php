@extends('layouts.app')

@section('title', 'Settings')
@section('header-title', 'Settings')

@section('sidebar')
    <nav class="w-80 bg-[#1e293b] text-white py-6 px-4 flex flex-col gap-2 min-h-[calc(100vh-64px)]">
        <a href="{{ route('applicant.dashboard') }}"
           class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">
            🏠 <span>Dashboard</span>
        </a>

        @if($application ?? false)
            <a href="{{ route('applications.show', $application->id) }}"
               class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">
                📄 <span>My Application</span>
            </a>
        @endif

        <a href="{{ route('messages.index') }}"
           class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">
            💬 <span>Messages</span>
        </a>

        <a href="{{ route('feedbacks.index') }}"
           class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">
            ⭐ <span>Feedback</span>
        </a>

        <a href="{{ route('applicants.edit', $applicant->id) }}"
           class="flex items-center gap-2 px-3 py-2 bg-[#162139] rounded-md transition-all">
            ⚙️ <span>Settings</span>
        </a>
    </nav>
@endsection

@section('content')
    <div class="bg-white p-8 rounded-2xl shadow-md max-w-3xl w-full mb-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-blue-800">Update Profile</h2>

            <form method="POST" action="{{ route('applicant.logout') }}">
                @csrf
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm font-medium shadow">
                    Logout
                </button>
            </form>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 p-3 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

       <form method="POST" action="{{ route('applicants.update', $applicant->id) }}" class="space-y-5">

            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="fullname" value="{{ old('fullname', $applicant->fullname) }}"
                       class="w-full border border-gray-300 rounded-md p-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('fullname') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="text" name="phone" value="{{ old('phone', $applicant->phone) }}"
                       class="w-full border border-gray-300 rounded-md p-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('phone') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="bg-blue-700 hover:bg-blue-800 text-white px-6 py-2 rounded-md font-medium shadow">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
@endsection
