@extends('layouts.app')

@section('title', 'Applicant Dashboard')
@section('header-title', 'Applicant Dashboard')

@section('sidebar')
    <nav class="w-80 bg-[#1e293b] text-white p-4 flex flex-col justify-content min-h-[calc(100vh-64px)]">
        <a href="{{ route('applicant.dashboard') }}" class="block p-2 rounded hover:bg-[#162139]">🏠 Dashboard</a>
        @if($application)
    <a href="{{ route('applications.show', $application->id) }}" class="...">
        📄 My Application
    </a>
@endif

         <a href="{{ route('messages.index') }}" class="block p-2 rounded hover:bg-[#162139]">💬 Messages</a>
        <a href="{{ route('feedbacks.index') }}" class="block p-2 rounded hover:bg-[#162139]">⭐ Feedback</a>
    </nav>
@endsection

@section('content')
    <form method="POST" action="{{ route('applicant.logout') }}" class="mb-6">
        @csrf
        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-sm font-semibold px-4 py-2 rounded">
            Logout
        </button>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Jobs -->
        <div class="bg-blue-900 text-white p-4 rounded-xl shadow">
            <div class="text-2xl font-bold">{{ $totalJobs ?? 0 }}</div>
            <div class="text-sm mt-1">Jobs</div>
        </div>

        <!-- Messages -->
        <div class="bg-blue-700 text-white p-4 rounded-xl shadow">
            <div class="text-2xl font-bold">{{ $totalMessages ?? 0 }}</div>
            <div class="text-sm mt-1">Messages</div>
        </div>

        <!-- Feedback -->
        <div class="bg-orange-500 text-white p-4 rounded-xl shadow">
            <div class="text-2xl font-bold">{{ $totalFeedback ?? 0 }}</div>
            <div class="text-sm mt-1">Feedback</div>
        </div>
    </div>

    
<!-- Job Cards -->
<div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3 mt-6">
    @forelse ($jobs as $job)
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-lg transition duration-200 p-6 flex flex-col justify-between">
            <div class="space-y-2">
                <h3 class="text-lg font-semibold text-[#1e2a47]">{{ $job->title }}</h3>
                <p class="text-gray-600 text-sm">{{ Str::limit($job->description, 100) }}</p>

                <div class="flex flex-wrap gap-4 mt-3 text-sm text-gray-500">
                    <span class="flex items-center gap-1">📍 {{ $job->location }}</span>
                    <span class="flex items-center gap-1">🕒 {{ \Carbon\Carbon::parse($job->application_deadline)->format('M d, Y') }}</span>
                    <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs font-semibold">
                        {{ $job->employment_type }}
                    </span>
                </div>
            </div>

            <div class="flex gap-3 mt-6">
                <a href="{{ route('jobs.show', $job->id) }}"
                   class="bg-[#1e2a47] text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-[#162139] transition">
                    View Details
                </a>
                <a href="{{ route('applications.create', ['job_id' => $job->id]) }}"
                   class="bg-orange-500 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-orange-600 transition">
                    Apply
                </a>
            </div>
        </div>
 
    @empty
        <p class="text-gray-500">No jobs available at the moment.</p>
    @endforelse
@endsection
