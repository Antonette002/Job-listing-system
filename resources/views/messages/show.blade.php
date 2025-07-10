@extends('layouts.app')

@section('Messages', 'Chat with ' . ($chatUser->company?->name ?? $chatUser->applicant?->full_name ?? $chatUser->name))

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow rounded overflow-hidden flex flex-col h-[80vh]">

    <!-- Header -->
    <div class="bg-blue-600 text-white px-4 py-3">
        <h2>
    @if (auth()->user()->role === 'company')
        Select an Applicant to Chat With
    @elseif (auth()->user()->role === 'applicant')
        Select a Company to Chat With
    @else
        Select a User to Chat With
    @endif
</h2>

    </div>

    <!-- Messages container -->
    <div id="messages" class="flex-1 overflow-y-auto p-4 space-y-2 bg-gray-100">
        @foreach ($messages as $message)
            <div class="flex {{ $message->sender_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                <div class="relative max-w-xs md:max-w-sm px-4 py-2 rounded-lg shadow 
                    {{ $message->sender_id === auth()->id() ? 'bg-blue-500 text-white' : 'bg-white text-gray-800' }}">
                    <p class="text-sm">{{ $message->content }}</p>
                    <small class="block text-xs mt-1 text-gray-300">
                        {{ $message->created_at->format('H:i') }}
                    </small>

                    <!-- Reply and Delete -->
                    @if ($message->sender_id === auth()->id())
                        <form action="{{ route('messages.destroy', $message->id) }}" method="POST" class="absolute top-1 right-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs text-red-400 hover:text-red-600">🗑️</button>
                        </form>
                    @endif

                    <!-- Reply (for all messages) -->
                    <button 
                        onclick="document.getElementById('message-input').value = 'Re: {{ $message->content }}'; document.getElementById('message-input').focus();"
                        class="absolute bottom-1 right-1 text-xs text-green-600 hover:text-green-800"
                    >↩️</button>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Form -->
    <form action="{{ route('messages.store') }}" method="POST" class="flex gap-2 p-4 border-t bg-white">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $chatUser->id }}">
        <input 
            type="text" 
            name="content" 
            id="message-input"
            class="flex-grow border rounded p-2 focus:outline-blue-500" 
            placeholder="Type a message..." 
            required
        >
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Send</button>
    </form>
</div>

<!-- Auto scroll -->
<script>
    window.onload = () => {
        const box = document.getElementById('messages');
        box.scrollTop = box.scrollHeight;
    };
</script>
@endsection
