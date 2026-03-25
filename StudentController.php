<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Get students from session (initialize if empty)
    private function getStudents()
    {
        if (!session()->has('students')) {
            $students = [
                ['id' => 1, 'name' => 'Alice Johnson', 'email' => 'alice@example.com'],
                ['id' => 2, 'name' => 'Bob Smith', 'email' => 'bob@example.com'],
                ['id' => 3, 'name' => 'Carol Davis', 'email' => 'carol@example.com'],
            ];
            session()->put('students', $students);
        }
        return session()->get('students');
    }

    // Save students back to session
    private function saveStudents($students)
    {
        session()->put('students', $students);
    }

    // Public list (used by /students-view)
    public function index()
    {
        $students = $this->getStudents();
        return view('students', compact('students'));
    }

    // Admin list (used by /admin/students)
    public function adminIndex()
    {
        $students = $this->getStudents();
        return view('admin.students', compact('students'));
    }

    // Handle update (PUT)
    public function update(Request $request, $id)
    {
        $students = $this->getStudents();

        foreach ($students as &$student) {
            if ($student['id'] == $id) {
                $student['name'] = $request->input('name');
                break;
            }
        }

        $this->saveStudents($students);

        return redirect()->back()->with('success', "Student ID {$id} updated to: " . $request->input('name'));
    }

    // Handle delete (DELETE)
    public function destroy($id)
    {
        $students = $this->getStudents();

        $students = array_filter($students, function ($student) use ($id) {
            return $student['id'] != $id;
        });

        $students = array_values($students); // re-index

        $this->saveStudents($students);

        return redirect()->back()->with('success', "Student ID {$id} deleted successfully.");
    }
}