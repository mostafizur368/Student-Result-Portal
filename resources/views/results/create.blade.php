@extends('layouts.app')
@section('title','Add Result')
@section('content')
<div class="card"><h1>Add Student Result</h1>
@if($students->isEmpty())<p>No students exist. Please <a href="{{ route('students.create') }}">add a student</a> first.</p>@else
<form method="POST" action="{{ route('results.store') }}">@csrf @include('results._form')</form>
@endif
</div>
@endsection
