<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    private $columns = ['studentName','age'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
    return view('students', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addStudent');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$student = new Student();
        //$student->studentName = $request->studentName;
        //$student->age = $request->age;
       //$student->save();
        //return 'Inserted Successfully';
        $data = $request->validate([
            'studentName' => 'required|max:100|min:5',
            'age' => 'integer|min:1',
        ]);
        Student::create($data);
        return redirect('students');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return view('showStudent', compact('student'));    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('editStudent', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'studentName' => 'required|max:100|min:5',
            'age' => 'integer|min:1',
        ]);

        Student::where('id', $id)->update($data);
        return redirect('students')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
{
    $id = $request->id;
    Student::where('id', $id)->delete();
    return redirect('students');
}
/**
     *trash
     */
    public function trash()
    {
        $trash = Student::onlyTrashed()->get();
        return view('trashStudents', compact('trash'));
    }
    
/**
     *Restore
     */
    public function restore(string $id)
    {
        
        Student::where('id',$id)->restore();
        return redirect('students');
    }
      /**
     * Force Delete
     */
    public function forceDelete(Request $request)
    {
        $id = $request->id;
        Student::where('id',$id)->forceDelete();
        return redirect('trashStudents');
    }
}