<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-200">
    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-bold text-center text-blue-600 mb-6">Job Listings</h1>

        @if($jobs->count() > 0)
            <div class="space-y-4">
                @foreach ($jobs as $job)
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <h2 class="text-2xl font-semibold text-gray-800">{{ $job->title }}</h2>
                        <p class="text-gray-600">{{ $job->description }}</p>
                        <p class="mt-2 text-gray-500">Company: {{ $job->company->name }}</p>
                        <a href="#" class="text-blue-500 hover:text-blue-700 mt-4 inline-block">View Details</a>
                        
                        <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('Delete this job?');" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
                                Delete
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500">No jobs found.</p>
        @endif
    </div>
</body>
</html>
