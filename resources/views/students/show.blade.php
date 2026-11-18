@extends('layouts.app')
@section('title','Student Details')
@section('content')
<div class="card">
    <div class="actions" style="justify-content:space-between"><h1>Student Details</h1>
    @auth<div class="actions"><a class="btn secondary" href="{{ route('students.edit',$student) }}">Edit</a>
    <form method="POST" action="{{ route('students.destroy',$student) }}" onsubmit="return confirm('Delete this student and all related results?')">@csrf @method('DELETE')<button class="btn danger">Delete</button></form></div>@endauth
    </div>
    <p><strong>Name:</strong> {{ $student->name }}</p><p><strong>Roll:</strong> {{ $student->roll }}</p>
    <p><strong>Department:</strong> {{ $student->department }}</p><p><strong>Email:</strong> {{ $student->email }}</p>
</div>
<div class="card">
    <div class="actions" style="justify-content:space-between"><h1>Course Results</h1>
    @auth<a class="btn" href="{{ route('results.create') }}">+ Add Result</a>@endauth</div>
    <table><thead><tr><th>Course Marks</th><th>Grade</th></tr></thead><tbody>
    @forelse($student->results as $result)<tr><td>{{ number_format($result->course_marks,2) }}</td><td><span class="badge">{{ $result->grade }}</span></td></tr>
    @empty<tr><td colspan="2">No results recorded.</td></tr>@endforelse
    </tbody></table>
</div>
<a class="btn secondary" href="{{ route('students.index') }}">Back to Students</a>
@endsection
