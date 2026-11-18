@extends('layouts.app')
@section('title','Results')
@section('content')
<div class="card">
    <div class="actions" style="justify-content:space-between"><div><h1>Student Results</h1><p class="muted">Grades are calculated automatically from course marks.</p></div><a class="btn" href="{{ route('results.create') }}">+ Add Result</a></div>
    <div style="overflow-x:auto"><table><thead><tr><th>Student</th><th>Roll</th><th>Department</th><th>Marks</th><th>Grade</th><th>Actions</th></tr></thead><tbody>
    @forelse($results as $result)<tr>
        <td>{{ $result->student->name }}</td><td>{{ $result->student->roll }}</td><td>{{ $result->student->department }}</td>
        <td>{{ number_format($result->course_marks,2) }}</td><td><span class="badge">{{ $result->grade }}</span></td>
        <td><div class="actions"><a class="btn secondary" href="{{ route('results.edit',$result) }}">Edit</a>
        <form method="POST" action="{{ route('results.destroy',$result) }}" onsubmit="return confirm('Delete this result?')">@csrf @method('DELETE')<button class="btn danger">Delete</button></form></div></td>
    </tr>@empty<tr><td colspan="6">No results available.</td></tr>@endforelse
    </tbody></table></div>
    <div style="margin-top:16px">{{ $results->links() }}</div>
</div>
@endsection
