
@extends('layouts.app')

@section('title', 'Applications')
@section('header-title', 'View Applications')

@section('sidebar')
    <nav class="w-80 bg-[#1e293b] text-white py-6 px-4 flex flex-col gap-2 min-h-[calc(100vh-64px)]">
        <a href="{{ route('companies.dashboard') }}"
           class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">
            🏠 <span>Dashboard</span>
        </a>

        <a href="{{ route('jobs.index') }}"
           class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">
            📋 <span>Manage Jobs</span>
        </a>

        <a href="{{ route('applications.index') }}"
           class="flex items-center gap-2 px-3 py-2 rounded-md bg-[#162139]">
            📂 <span>Applications</span>
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
    <h2 class="text-3xl font-bold text-blue-900 mb-6 text-center">All Applications</h2>

    @if($applications->count() > 0)
        <div class="space-y-6">
            @foreach ($applications as $application)
                <div class="bg-white border border-blue-900 rounded-xl shadow-md p-6 grid gap-4">
                    <!-- Info -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">{{ $application->applicant->full_name }}</h3>
                        <p class="text-gray-600 text-sm">📍 Location: {{ $application->applicant->location }}</p>
                        <p class="text-sm mt-1">💼 Job: <span class="text-blue-800">{{ $application->job->title }}</span></p>

                        <div class="mt-3 space-y-2 text-sm">
                            <p>
                                📄 CV:
                                @if($application->cv_path)
                                    <a href="{{ asset('storage/' . $application->cv_path) }}" target="_blank"
                                       class="text-blue-600 hover:underline">Download CV</a>
                                @else
                                    <span class="text-gray-400">Not uploaded</span>
                                @endif
                            </p>
                            <p>
                                📝 Cover Letter:
                                @if($application->cover_letter)
                                    <a href="{{ asset('storage/' . $application->cover_letter) }}" target="_blank"
                                       class="text-blue-600 hover:underline">Download Cover Letter</a>
                                @else
                                    <span class="text-gray-400">Not uploaded</span>
                                @endif
                            </p>
                            <p>
                                📌 Status:
                                @if($application->status === 'accepted')
                                    <span class="font-semibold text-green-600 bg-green-100 px-2 py-1 rounded-full">Accepted</span>
                                @elseif($application->status === 'rejected')
                                    <span class="font-semibold text-red-600 bg-red-100 px-2 py-1 rounded-full">Rejected</span>
                                @else
                                    <span class="font-semibold text-yellow-600 bg-yellow-100 px-2 py-1 rounded-full">Pending</span>
                                @endif
                            </p>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex gap-3 mt-2">
                        <form method="POST" action="{{ route('applications.updateStatus', [$application->id, 'accepted']) }}">
                            @csrf
                            @method('PATCH')
                            <button class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded text-sm">
                                ✅ Accept
                            </button>
                        </form>

                        <form method="POST" action="{{ route('applications.updateStatus', [$application->id, 'rejected']) }}">
                            @csrf
                            @method('PATCH')
                            <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded text-sm">
                                ❌ Reject
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-gray-500">No applications available at the moment.</p>
    @endif
@endsection
