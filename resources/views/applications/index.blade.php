<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applications</title>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-200">
    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-bold text-center text-blue-600 mb-6">Applications</h1>

        @if($applications->count() > 0)
            <div class="space-y-4">
                @foreach ($applications as $application)
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <h2 class="text-2xl font-semibold text-gray-800">{{ $application->applicant->full_name }}</h2>
                        <p class="text-gray-600">Applicant Location:{{ $application->applicant->location }}</p>
                        <p class="mt-2 text-gray-500">Job Title: {{ $application->job->title}}</p>
                        <p class="mt-2 text-gray-500">CV: {{ $application->cv_path}}</p>
                          <p class="mt-2 text-gray-500">Cover Letter: {{ $application->cover_letter}}</p>
                            <p class="mt-2 text-gray-500">Status: {{ $application->status}}</p>
                        <a href="#" class="text-blue-500 hover:text-blue-700 mt-4 inline-block">View Details</a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500">No application available at the moment.</p>
        @endif
    </div>
</body>
</html>
