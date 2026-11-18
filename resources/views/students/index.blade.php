@extends('layouts.app')
@section('title','Students')
@section('content')
<div class="card">
    <div class="actions" style="justify-content:space-between;align-items:center">
        <div><h1>Student Records</h1><p class="muted">View student information and their course results.</p></div>
        @auth<a class="btn" href="{{ route('students.create') }}">+ Add Student</a>@endauth
    </div>
    <div style="overflow-x:auto">
    <table>
        <thead><tr><th>Name</th><th>Roll</th><th>Department</th><th>Email</th><th>Results</th><th>Action</th></tr></thead>
        <tbody>
        @forelse($students as $student)
            <tr>
                <td>{{ $student->name }}</td><td>{{ $student->roll }}</td><td>{{ $student->department }}</td><td>{{ $student->email }}</td>
                <td>{{ $student->results->count() }}</td>
                <td><a class="btn secondary" href="{{ route('students.show',$student) }}">View</a></td>
            </tr>
        @empty<tr><td colspan="6">No students found. @auth<a href="{{ route('students.create') }}">Add the first student</a>@endauth</td></tr>@endforelse
        </tbody>
    </table>
    </div>
    <div style="margin-top:16px">{{ $students->links() }}</div>
</div>
@endsection
