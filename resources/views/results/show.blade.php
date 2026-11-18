@extends('layouts.app')
@section('title','Result Details')
@section('content')
<div class="card"><h1>Result Details</h1><p><strong>Student:</strong> {{ $result->student->name }}</p><p><strong>Marks:</strong> {{ $result->course_marks }}</p><p><strong>Grade:</strong> {{ $result->grade }}</p><a class="btn secondary" href="{{ route('results.index') }}">Back</a></div>
@endsection
