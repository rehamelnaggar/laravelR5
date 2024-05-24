<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Storage; 
use App\Traits\traits\UploadFile;

class StudentController extends Controller
{
    use UploadFile;

    private $columns = ['studentName', 'age'];

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
        $messages = $this->errMsg();
        $data = $request->validate([
            'studentName' => 'required|max:100|min:5',
            'age' => 'integer|min:1',
            'image' => 'nullable|file|mimes:jpg,png,jpeg,gif|max:2048',
        ], $messages);
    
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $fileName = $this->uploadImage($request->file('image'), 'assets/images');
            $data['image'] = $fileName;
        }
    
        $data['active'] = $request->has('active') ? 1 : 0;
    
        try {
            Student::create($data);
            return redirect('students')->with('success', 'Student inserted successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to create student. Please try again.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return view('showStudent', compact('student'));
    }

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
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'studentName' => 'required|max:100|min:5',
            'age' => 'integer|min:1',
            'image' => 'nullable|file|mimes:jpg,png,jpeg,gif|max:2048',
        ]);
    
        $student = Student::findOrFail($id);
    
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $fileName = $this->uploadImage($request->file('image'), 'assets/images');
    
            if ($student->image) {
                $this->deleteImage('assets/images/' . $student->image);
            }
    
            $data['image'] = $fileName;
        } else {
            $data['image'] = $student->image;
        }
    
        $data['active'] = $request->has('active') ? 1 : 0;
    
        try {
            $student->update($data);
            return redirect('students')->with('success', 'Student updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to update student. Please try again.']);
        }
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $student = Student::findOrFail($id);

        if ($student->image) {
            $this->deleteImage('assets/images/' . $student->image);
        }

        $student->delete();
        return redirect('students')->with('success', 'Student deleted successfully.');
    }

    /**
     * Trash.
     */
    public function trash()
    {
        $trash = Student::onlyTrashed()->get();
        return view('trashStudents', compact('trash'));
    }

    /**
     * Restore.
     */
    public function restore(string $id)
    {
        Student::where('id', $id)->restore();
        return redirect('students')->with('success', 'Student restored successfully.');
    }

    /**
     * Force Delete.
     */
    public function forceDelete(Request $request)
    {
        $id = $request->id;
        $student = Student::withTrashed()->findOrFail($id);

        if ($student->image) {
            $this->deleteImage('assets/images/' . $student->image);
        }

        $student->forceDelete();
        return redirect('trashStudents')->with('success', 'Student permanently deleted.');
    }

    /**
     * Delete image from storage.
     */
    private function deleteImage($path)
    {
        Storage::disk('public')->delete($path);
    }

    /**
     * Error custom messages.
     */
    public function errMsg()
    {
        return [
            'studentName.required' => 'The student name is missed, please insert',
            'studentName.min' => 'Length less than 5, please insert more chars',
            'age.required' => 'The age is missed, please insert',
            'age.min' => 'Length less than 1, please insert more chars',
        ];
    }
}