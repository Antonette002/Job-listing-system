{{-- resources/views/applicants/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Applicant Details')

@section('content')
<h1>Applicant Details</h1>
<p>Name: {{ $applicant->full_name ?? 'N/A' }}</p>
<p>Email: {{ $applicant->user->email ?? 'N/A' }}</p>
@endsection
