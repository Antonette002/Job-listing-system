
@extends('layouts.app')

@section('title', 'Messages')
@section('header-title', 'Messages')

@section('sidebar')
<nav class="w-80 bg-[#1e293b] text-white py-6 px-4 flex flex-col gap-2 min-h-[calc(100vh-64px)]">
    <a href="{{ route('applicant.dashboard') }}" class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">🏠 Dashboard</a>
    <a href="{{ route('messages.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-md bg-[#162139]">💬 Messages</a>
    <a href="{{ route('feedbacks.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">⭐ Feedback</a>
</nav>
@endsection

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow rounded p-6 space-y-6">

    <h2 class="text-2xl font-semibold text-blue-900 border-b pb-2">
        @if (auth()->user()->role === 'applicant')
            Select a Company to Chat With
        @elseif (auth()->user()->role === 'company')
            Select an Applicant to Chat With
        @else
            Select a User to Chat With
        @endif
    </h2>

    <ul class="divide-y divide-gray-200">
        @foreach ($users as $user)
            <li>
                <a href="{{ route('messages.show', $user->id) }}"
                   class="flex items-center justify-between py-3 px-4 hover:bg-blue-50 rounded transition group">
                    <div class="flex items-center gap-3">
                        <span class="text-2xl">
                            @if ($user->role === 'company') 💼 @else 👤 @endif
                        </span>
                        <span class="text-gray-800 font-medium group-hover:text-blue-800">
                            @if ($user->role === 'company' && isset($user->company))
                                {{ $user->company->name ?? 'Company' }}
                            @elseif ($user->role === 'applicant' && isset($user->applicant))
                                {{ $user->applicant->full_name ?? 'Applicant' }}
                            @else
                                Unknown
                            @endif
                        </span>
                    </div>
                    <span class="text-sm text-gray-400 group-hover:text-blue-500">→</span>
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endsection

