@if($errors->any())
<div class="card" style="border-left:4px solid #dc2626"><strong>Please correct the following errors:</strong>
    <ul>@foreach($errors->all() as $error)<li class="error" style="margin:6px 0">{{ $error }}</li>@endforeach</ul>
</div>
@endif
<div class="grid">
    <div><label for="name">Full Name</label><input id="name" name="name" value="{{ old('name',$student->name ?? '') }}" required></div>
    <div><label for="roll">Roll</label><input id="roll" name="roll" value="{{ old('roll',$student->roll ?? '') }}" required></div>
    <div><label for="department">Department</label><input id="department" name="department" value="{{ old('department',$student->department ?? '') }}" required></div>
    <div><label for="email">Email</label><input id="email" type="email" name="email" value="{{ old('email',$student->email ?? '') }}" required></div>
    <div><label for="phone">Phone</label><input id="phone" name="phone" value="{{ old('phone',$student->phone ?? '') }}"></div>
    <div><label for="dob">Date of Birth</label><input id="dob" type="date" name="dob" value="{{ old('dob',isset($student) && $student->dob ? $student->dob->format('Y-m-d') : '') }}"></div>
    <div><label for="gender">Gender</label><select id="gender" name="gender"><option value="">Select gender</option>@foreach(['Male','Female','Other'] as $g)<option value="{{ $g }}" @selected(old('gender',$student->gender ?? '') === $g)>{{ $g }}</option>@endforeach</select></div>
    <div><label for="password">Password (optional)</label><input id="password" type="password" name="password" minlength="8" placeholder="At least 8 characters"></div>
</div>
<button class="btn" type="submit">Save Student</button>
<a class="btn secondary" href="{{ route('students.index') }}">Cancel</a>
