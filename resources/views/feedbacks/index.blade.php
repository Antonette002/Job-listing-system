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
                    <div class="p-4 bg-green-100 rounded shadow">
                        <p class="text-gray-800">{{ $feedback->message }}</p>
                        <small class="text-gray-500 italic">{{ $feedback->created_at->diffForHumans() }}</small>
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
