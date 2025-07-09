@extends('layouts.app')

@section('title', 'Conversation with ' . $user->name)

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow rounded">

    <h2 class="text-2xl font-semibold mb-6">Chat with {{ $user->name }}</h2>

    <div id="messages-container" class="space-y-3 mb-6 max-h-96 overflow-y-auto border rounded p-4 bg-gray-50" style="scroll-behavior: smooth;">
        @foreach ($messages as $message)
            <div class="flex {{ $message->sender_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                <div class="max-w-xs px-4 py-2 rounded-lg 
                    {{ $message->sender_id === auth()->id() ? 'bg-blue-600 text-white' : 'bg-gray-300 text-gray-900' }}">
                    <p class="whitespace-pre-wrap">{{ $message->content }}</p>
                    <span class="block text-xs mt-1 text-right opacity-70 select-none">
                        {{ $message->created_at->format('H:i') }}
                        @if ($message->read_at && $message->sender_id === auth()->id())
                            ✓
                        @endif
                    </span>
                </div>
            </div>
        @endforeach
    </div>

    <form action="{{ route('messages.store') }}" method="POST" class="flex gap-3">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $user->id }}">
        <input
            type="text"
            name="content"
            class="flex-grow border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Type your message..."
            required
            autocomplete="off"
        >
        <button
            type="submit"
            class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition"
        >
            Send
        </button>
    </form>

</div>

<script>
    // Auto-scroll to the bottom on page load
    const messagesContainer = document.getElementById('messages-container');
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
</script>
@endsection
