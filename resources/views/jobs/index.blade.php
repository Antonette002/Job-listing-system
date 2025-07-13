@extends('layouts.app')

@section('title', 'Job Listings')
@section('header-title', 'Manage Jobs')

@section('sidebar')
    <nav class="w-80 bg-[#1e293b] text-white py-6 px-4 flex flex-col gap-2 min-h-[calc(100vh-64px)]">
        <a href="{{ route('companies.dashboard') }}"
           class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">
            🏠 <span>Dashboard</span>
        </a>

        <a href="{{ route('jobs.index') }}"
           class="flex items-center gap-2 px-3 py-2 rounded-md bg-[#162139]">
            📋 <span>Manage Jobs</span>
        </a>

        <a href="{{ route('messages.index') }}"
           class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">
            💬 <span>Messages</span>
        </a>

        <a href="{{ route('feedbacks.index') }}"
           class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">
            ⭐ <span>Feedback</span>
        </a>

        <a href="{{ route('company.settings') }}"
           class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">
            ⚙️ <span>Settings</span>
        </a>
    </nav>
@endsection

@section('content')
<div class="max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold text-blue-800 mb-8 text-center">All Job Listings</h2>

    @if($jobs->count() > 0)
        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($jobs as $job)
                <div class="bg-white border border-blue-900 rounded-xl shadow-md p-6 flex flex-col justify-between">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">{{ $job->title }}</h3>
                        <p class="text-gray-600 text-sm mt-1">{{ Str::limit($job->description, 120) }}</p>
                        <p class="mt-2 text-sm text-gray-500">Company: <span class="text-blue-700">{{ $job->company->name }}</span></p>
                    </div>

                    <div class="flex justify-between items-center mt-6">
                        <a href="{{ route('jobs.show', $job->id) }}"
                           class="text-sm text-blue-700 hover:underline font-medium">
                            🔍 View Details
                        </a>

                        <div class="flex gap-2">
                            <a href="{{ route('jobs.edit', $job->id) }}"
                               class="px-3 py-1 bg-orange-500 text-white text-sm rounded hover:bg-orange-600 transition">
                                ✏️ Edit
                            </a>

                            <form action="{{ route('jobs.destroy', $job->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this job?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700 transition">
                                    🗑️ Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-gray-500">No jobs found.</p>
    @endif
</div>
@endsection
