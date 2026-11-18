@extends('layouts.app')
@section('title','Student Registration')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/registration.css') }}">
<style>
    .container{max-width:1000px}.registration-panel{background:#fff;border:1px solid #e2e8f0;border-radius:16px;padding:28px;box-shadow:0 8px 30px rgba(24,45,85,.045);margin-top:22px}
    .intro{margin-bottom:26px}.eyebrow{color:#315efb;font-size:.74rem;font-weight:800;letter-spacing:.13em}
    .registration-panel h2{color:#172b4d}.form-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:20px 22px}
    .field{display:flex;flex-direction:column;gap:7px}.field label,.field legend{font-size:.88rem;font-weight:700}
    .field input:not([type=radio]),.field select{width:100%;min-height:46px;border:1px solid #cbd5e1;border-radius:8px;padding:10px 12px;font:inherit}
    fieldset{border:0;padding:0;margin:0}.radio-options{display:flex;gap:20px;flex-wrap:wrap}.radio-label{display:inline-flex;align-items:center;gap:6px}
    .full-width{grid-column:1/-1}.form-actions{display:flex;gap:12px;margin-top:25px}.submit-btn{background:#315efb;color:#fff}.reset-btn{background:#e2e8f0;color:#334155}
    .error{color:#dc2626;font-size:.78rem}.hint{color:#64748b;font-size:.76rem}
    @media(max-width:640px){.form-grid{grid-template-columns:1fr}.full-width{grid-column:auto}.form-actions{flex-direction:column}.form-actions button{width:100%}}
</style>
@endpush
@section('content')
<section class="intro">
    <p class="eyebrow">STUDENT SERVICES</p>
    <h1>Student Registration</h1>
    <p class="muted">Complete the form below to register. All fields are required.</p>
</section>

<section class="registration-panel">
    <h2>Registration Form</h2>
    <p class="muted">Enter your information carefully.</p>

    @if($errors->any())
        <div class="alert" style="background:#fee2e2;color:#991b1b">
            <strong>Please correct these errors:</strong>
            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form id="studentForm" method="POST" action="{{ route('registration.store') }}">
        @csrf
        <div class="form-grid">
            <div class="field">
                <label for="name">Full Name *</label>
                <input id="name" name="name" value="{{ old('name') }}" placeholder="Enter your full name" required>
            </div>
            <div class="field">
                <label for="roll">Student Roll *</label>
                <input id="roll" name="roll" value="{{ old('roll') }}" placeholder="Enter your roll number" required>
            </div>
            <div class="field">
                <label for="email">Email Address *</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" required>
            </div>
            <div class="field">
                <label for="phone">Phone Number *</label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="e.g. 01XXXXXXXXX" required>
            </div>
            <div class="field">
                <label for="dob">Date of Birth *</label>
                <input type="date" id="dob" name="dob" value="{{ old('dob') }}" max="{{ date('Y-m-d') }}" required>
            </div>
            <div class="field">
                <label for="department">Department *</label>
                <select id="department" name="department" required>
                    <option value="">Select your department</option>
                    @foreach(['Computer Science & Engineering','Electrical & Electronic Engineering','Business Administration','English','Economics','Pharmacy'] as $dept)
                        <option value="{{ $dept }}" @selected(old('department') === $dept)>{{ $dept }}</option>
                    @endforeach
                </select>
            </div>
            <fieldset class="field">
                <legend>Gender *</legend>
                <div class="radio-options">
                    @foreach(['Male','Female','Other'] as $gender)
                        <label class="radio-label"><input type="radio" name="gender" value="{{ $gender }}" @checked(old('gender') === $gender)> {{ $gender }}</label>
                    @endforeach
                </div>
            </fieldset>
            <div class="field">
                <label for="password">Password *</label>
                <input type="password" id="password" name="password" minlength="8" placeholder="At least 8 characters" required>
                <small class="hint">Password is securely hashed before being saved.</small>
            </div>
        </div>
        <div class="form-actions">
            <button class="submit-btn" type="submit">Register Student →</button>
            <button class="reset-btn" type="reset">Clear Form</button>
        </div>
    </form>
</section>

<section class="registration-panel">
    <div class="panel-heading" style="display:flex;justify-content:space-between;gap:12px;align-items:center;flex-wrap:wrap">
        <div><h2>Registered Students</h2><p class="muted">Student registrations saved in the database.</p></div>
        <span class="count">{{ $students->count() }} students</span>
    </div>
    <div class="table-wrap" style="overflow-x:auto">
        <table>
            <thead><tr><th>#</th><th>Full Name</th><th>Roll</th><th>Email</th><th>Phone</th><th>Date of Birth</th><th>Department</th><th>Gender</th></tr></thead>
            <tbody>
            @forelse($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td><td>{{ $student->name }}</td><td>{{ $student->roll }}</td>
                    <td>{{ $student->email }}</td><td>{{ $student->phone }}</td>
                    <td>{{ $student->dob?->format('Y-m-d') }}</td><td>{{ $student->department }}</td><td>{{ $student->gender }}</td>
                </tr>
            @empty
                <tr><td colspan="8" class="empty-state">No students registered yet.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
