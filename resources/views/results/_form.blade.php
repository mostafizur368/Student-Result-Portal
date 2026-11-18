@if($errors->any())<div class="card" style="border-left:4px solid #dc2626"><strong>Please correct the following errors:</strong><ul>@foreach($errors->all() as $error)<li class="error" style="margin:6px 0">{{ $error }}</li>@endforeach</ul></div>@endif
<label for="student_id">Student</label>
<select id="student_id" name="student_id" required>
<option value="">Select a student</option>
@foreach($students as $student)
<option value="{{ $student->id }}" @selected(old('student_id',$result->student_id ?? '') == $student->id)>{{ $student->name }} (Roll: {{ $student->roll }})</option>
@endforeach
</select>
<label for="course_marks">Course Marks (0–100)</label>
<input id="course_marks" type="number" name="course_marks" min="0" max="100" step="0.01" value="{{ old('course_marks',$result->course_marks ?? '') }}" required>
<p class="muted">Grade will be generated automatically after saving.</p>
<button class="btn" type="submit">Save Result</button>
<a class="btn secondary" href="{{ route('results.index') }}">Cancel</a>
