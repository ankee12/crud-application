<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Student;
use App\Http\Requests;

class StudentCtrl extends Controller
{
    public function index()
	{
		$student = Student::all();
		return view('student.liststudent')->with('student',$student);
	}
	public function create()
	{
		return view('student.create');
	}
	public function store(Request $request)
	{ 
		$student = new Student();
		$student->firstname = $request->firstname;
		$student->lastname = $request->lastname;
		$student->dob = $request->dob;
		$student->pob = $request->pob;
		$student->save();
		return redirect(route('liststudent'));
	}
	public function edit($id)
	{
		$student = Student::find($id);
		return view('student.create')->with('student',$student);
	}
	public function update(Request $request,$id)
	{
		$student = Student::find($id);
		$student->firstname = $request->firstname;
		$student->lastname = $request->lastname;
		$student->dob = $request->dob;
		$student->pob = $request->pob;
		$student->save();
		return redirect(route('liststudent'));
	}
	public function delete($id)
	{
		$student = Student::find($id);
		$student->delete();
		return redirect(route('liststudent'));
	}
}
