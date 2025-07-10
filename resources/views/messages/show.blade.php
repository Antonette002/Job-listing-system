@extends('layouts.app')

@section('title', 'Chat with ' . ($chatUser->company?->name ?? $chatUser->applicant?->full_name ?? $chatUser->name))

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow rounded-lg overflow-hidden flex flex-col h-[80vh] border">

    <!-- Header -->
    <div class="bg-blue-900 text-white px-6 py-4 flex justify-between items-center">
        <h2 class="text-lg font-semibold">
            Chat with {{ $chatUser->company?->name ?? $chatUser->applicant?->full_name ?? $chatUser->name }}
        </h2>
    </div>

    <!-- Messages container -->
    <div id="messages" class="flex-1 overflow-y-auto p-4 space-y-3 bg-gray-100">
        @forelse ($messages as $message)
            <div class="flex {{ $message->sender_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                <div class="relative max-w-xs md:max-w-sm px-4 py-3 rounded-xl shadow-sm
                    {{ $message->sender_id === auth()->id() 
                        ? 'bg-blue-600 text-white rounded-br-none' 
                        : 'bg-white text-gray-800 rounded-bl-none border' }}"
                >
                    <p class="text-sm">{{ $message->content }}</p>

                    <div class="text-xs mt-2 flex justify-between items-center text-gray-400">
                        <span>{{ $message->created_at->format('H:i') }}</span>
                        <div class="flex gap-1 items-center ml-2">
                            @if ($message->sender_id === auth()->id())
                                <!-- Delete Button -->
                                <form action="{{ route('messages.destroy', $message->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Delete"
                                            class="text-red-400 hover:text-red-600 transition text-xs">🗑️</button>
                                </form>
                            @endif

                            <!-- Reply Button -->
                            <button title="Reply"
                                onclick="document.getElementById('message-input').value = 'Re: {{ $message->content }}'; document.getElementById('message-input').focus();"
                                class="text-green-600 hover:text-green-800 transition text-xs">↩️</button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-gray-500 italic mt-12">No messages yet. Start the conversation!</div>
        @endforelse
    </div>

    <!-- Message Form -->
    <form action="{{ route('messages.store') }}" method="POST" class="flex gap-3 p-4 bg-white border-t">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $chatUser->id }}">

        <input 
            type="text" 
            name="content" 
            id="message-input"
            class="flex-grow border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Type a message..." 
            required
        >
        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-medium px-5 py-2 rounded-lg shadow">
            Send
        </button>
    </form>
</div>

<!-- Auto-scroll to bottom -->
<script>
    window.onload = () => {
        const box = document.getElementById('messages');
        box.scrollTop = box.scrollHeight;
    };
</script>
@endsection

