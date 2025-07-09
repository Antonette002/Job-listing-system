@extends('layouts.app')

@section('title', 'Chat with ' . ($chatUser->company?->name ?? $chatUser->name))

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow rounded space-y-6">

    <h2 class="text-xl font-semibold mb-4">
        Chat with {{ $chatUser->company?->name ?? $chatUser->name }}
    </h2>

    <div class="border rounded p-4 h-[400px] overflow-y-auto space-y-2 bg-gray-50">
        @forelse ($messages as $message)
            <div class="flex {{ $message->sender_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                <div class="max-w-xs px-4 py-2 rounded-lg 
                    {{ $message->sender_id === auth()->id() ? 'bg-blue-500 text-white' : 'bg-gray-200 text-black' }}">
                    {{ $message->content }}
                    <div class="text-xs mt-1 text-right opacity-75">
                        {{ $message->created_at->format('M d, H:i') }}
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-500">No messages yet.</p>
        @endforelse
    </div>

    <form action="{{ route('messages.store') }}" method="POST" class="flex gap-2">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $chatUser->id }}">
        <input 
            type="text" 
            name="content" 
            placeholder="Type your message..." 
            class="flex-grow border rounded p-2 focus:outline-none focus:ring" 
            required
        >
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Send
        </button>
    </form>

</div>
@endsection
