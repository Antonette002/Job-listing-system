<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Your Feedback</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">
    <div class="max-w-3xl w-full bg-white rounded shadow p-6">
        <h1 class="text-3xl font-bold mb-6 text-center text-blue-700">Your Feedback</h1>

        @if($feedbacks->count() > 0)
            <div class="space-y-4">
                @foreach ($feedbacks as $feedback)
                    <div class="p-4 bg-blue-50 rounded shadow border-l-4 
                        @if(Str::contains(strtolower($feedback->message), 'accepted')) border-green-500
                        @elseif(Str::contains(strtolower($feedback->message), 'rejected')) border-red-500
                        @else border-blue-400
                        @endif
                    ">
                        <p class="text-gray-800">{{ $feedback->message }}</p>

                        @if($feedback->rating)
                            <p class="text-yellow-600 text-sm mt-1">Rating: {{ $feedback->rating }}/5</p>
                        @endif

                        <small class="text-gray-500 italic block mt-2">{{ $feedback->created_at->diffForHumans() }}</small>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $feedbacks->links() }}
            </div>
        @else
            <p class="text-center text-gray-500 italic">No feedback available yet.</p>
        @endif
    </div>
</body>
</html>
