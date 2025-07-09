<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Your Feedback</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-start justify-center p-8">
  <div class="max-w-4xl w-full bg-white rounded-lg shadow-lg p-8 border border-gray-200">
    <h1 class="text-4xl font-extrabold mb-8 text-center text-blue-800 tracking-tight">Your Feedback</h1>

    @if($feedbacks->count() > 0)
      <div class="space-y-6">
        @foreach ($feedbacks as $feedback)
          <div 
            class="p-5 rounded-lg shadow-sm border-l-8 transition hover:shadow-md
              @if(Str::contains(strtolower($feedback->message), 'accepted')) border-green-500 bg-green-50
              @elseif(Str::contains(strtolower($feedback->message), 'rejected')) border-red-500 bg-red-50
              @else border-blue-500 bg-blue-50
              @endif
            "
          >
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
</body>
</html>
