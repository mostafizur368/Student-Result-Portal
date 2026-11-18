<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Student;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $results = Result::with('student')->latest()->paginate(10);
        return view('results.index', compact('results'));
    }

    public function create()
    {
        $students = Student::orderBy('name')->get();
        return view('results.create', compact('students'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'course_marks' => ['required', 'numeric', 'min:0', 'max:100'],
        ]);

        $result = Result::create($data);
        return redirect()->route('results.index')->with('success', 'Result saved. Grade calculated automatically.');
    }

    public function show(Result $result)
    {
        $result->load('student');
        return view('results.show', compact('result'));
    }

    public function edit(Result $result)
    {
        $students = Student::orderBy('name')->get();
        return view('results.edit', compact('result', 'students'));
    }

    public function update(Request $request, Result $result)
    {
        $data = $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'course_marks' => ['required', 'numeric', 'min:0', 'max:100'],
        ]);

        $result->update($data);
        return redirect()->route('results.index')->with('success', 'Result updated and grade recalculated.');
    }

    public function destroy(Result $result)
    {
        $result->delete();
        return redirect()->route('results.index')->with('success', 'Result deleted.');
    }
}
