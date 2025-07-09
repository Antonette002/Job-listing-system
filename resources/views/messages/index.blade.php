@extends('layouts.app')

@section('title', 'Messages')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow rounded">

    <h2 class="text-2xl font-semibold mb-6">Select a User to Chat With</h2>

    <ul class="divide-y divide-gray-200">
        @forelse ($users as $user)
            <li class="py-3 flex justify-between items-center hover:bg-gray-100 rounded px-3">
                <div>
                    <a href="{{ route('messages.show', $user->id) }}" class="text-blue-600 hover:underline">
                        {{ $user->company?->name ?? $user->name }}
                    </a>
                    <p class="text-sm text-gray-500">Role: {{ ucfirst($user->role ?? 'N/A') }}</p>
                </div>
                <div>
                    <!-- Optional: show unread count here -->
                </div>
            </li>
        @empty
            <li>No users found.</li>
        @endforelse
    </ul>

</div>
@endsection
