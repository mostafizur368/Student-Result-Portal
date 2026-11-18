<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        $students = Student::latest()->get();
        return view('registration.create', compact('students'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'roll' => ['required', 'string', 'max:50', 'unique:students,roll'],
            'email' => ['required', 'email', 'max:255', 'unique:students,email'],
            'phone' => ['required', 'string', 'max:30'],
            'dob' => ['required', 'date', 'before:today'],
            'department' => ['required', 'string', 'max:120'],
            'gender' => ['required', 'in:Male,Female,Other'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        Student::create($data);

        return redirect()->route('registration.create')
            ->with('success', 'Registration successful! Student information has been saved.');
    }
}
