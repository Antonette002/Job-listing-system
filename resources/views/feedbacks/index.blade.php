@extends('layouts.app')

@section('title', 'Your Feedback')
@section('header-title', 'Feedback')

@section('sidebar')
<nav class="w-80 bg-[#1e293b] text-white py-6 px-4 flex flex-col gap-2 min-h-[calc(100vh-64px)]">
    <a href="{{ route('applicant.dashboard') }}" class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">🏠 Dashboard</a>
    <a href="{{ route('feedbacks.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-md bg-[#162139]">⭐ Feedback</a>
    <a href="{{ route('messages.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-[#162139] transition-all">💬 Messages</a>
</nav>
@endsection

@section('content')
<div class="bg-white rounded-lg shadow-lg p-8 border border-gray-200 max-w-4xl mx-auto">
    <h1 class="text-3xl font-extrabold mb-8 text-center text-blue-800 tracking-tight">Your Feedback</h1>

    @if($feedbacks->count() > 0)
        <div class="space-y-6">
            @foreach ($feedbacks as $feedback)
                <div 
                    class="p-5 rounded-lg shadow-sm border-l-8 transition hover:shadow-md
                        @if(Str::contains(strtolower($feedback->message), 'accepted')) border-green-500 bg-green-50
                        @elseif(Str::contains(strtolower($feedback->message), 'rejected')) border-red-500 bg-red-50
                        @else border-blue-500 bg-blue-50
                        @endif">
                    <p class="text-gray-900 text-lg leading-relaxed">{{ $feedback->message }}</p>

                    @if($feedback->rating)
                        <p class="mt-3 inline-block bg-yellow-200 text-yellow-800 text-sm font-semibold px-3 py-1 rounded-full select-none">
                            ⭐ Rating: {{ $feedback->rating }}/5
                        </p>
                    @endif

                    <small class="block mt-4 text-gray-500 italic font-mono tracking-wide">
                        {{ $feedback->created_at->diffForHumans() }}
                    </small>
                </div>
            @endforeach
        </div>

        <div class="mt-10 flex justify-center">
            {{ $feedbacks->links('pagination::tailwind') }}
        </div>
    @else
        <p class="text-center text-gray-500 italic text-lg mt-12">No feedback available yet.</p>
    @endif
</div>
@endsection


