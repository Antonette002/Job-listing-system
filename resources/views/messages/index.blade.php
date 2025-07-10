@extends('layouts.app')

@section('title', 'Messages')

@section('content')
<div class="flex flex-col gap-6 p-6">

  <h2 class="text-2xl font-semibold mb-6">
    @if (auth()->user()->role === 'applicant')
        Select a company to chat with
    @elseif (auth()->user()->role === 'company')
        Select an applicant to chat with
    @else
        Select a user to chat with
    @endif
</h2>


    <ul class="bg-white shadow rounded divide-y divide-gray-200 overflow-hidden">
   @foreach ($users as $user)
    <a href="{{ route('messages.show', $user->id) }}" class="flex items-center gap-2 py-2 px-3 hover:bg-gray-100 rounded">
        
        {{-- Icon --}}
        <span class="text-gray-500">
            @if ($user->role === 'company')
                💼
            @else
                👤
            @endif
        </span>

        {{-- Name --}}
        <span class="font-medium">
            {{ $user->company->name ?? $user->applicant->name ?? 'Unknown' }}
        </span>
    </a>
@endforeach

      
    </ul>

</div>
@endsection


