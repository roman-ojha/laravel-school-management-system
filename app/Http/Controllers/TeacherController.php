<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Exception;

class TeacherController extends Controller
{
    public function teachers()
    {
        $teachers = Teacher::select(['id', 'name', 'salary',])->with(['teaches' => function ($q) {
            $q->select('name');
        }, 'faculties' => function ($q) {
            $q->select('name');
        }])->get();
        return view('pages.teacher.index', ['teachers' => $teachers]);
    }

    public function add_teacher(Request $req)
    {
        try {
            if (!$req->filled('name') || !$req->filled('salary')) {
                return view('pages.teacher.add_teacher', ['error' => "All field is required"]);
            }
            $teacher = new Teacher();
            $teacher->name = $req->input('name');
            $teacher->salary = $req->input('salary');
            $saved = $teacher->save();
            $teacher->teaches()->attach($req->input('teaches'));
            $teacher->faculties()->attach($req->input('faculties'));
            if (!$saved) {
                return view('pages.teacher.add_teacher', ['error' => 'Server Error!!!']);
            }
            return redirect()->route('teachers');
        } catch (Exception $err) {
            return view('pages.teacher.add_teacher', ['error' => 'Server Error!!!']);
        }
    }

    public function delete_teacher(Request $req, $id)
    {
        try {
            $teacher = Teacher::find($id);
            $teacher->teaches()->detach();
            $teacher->faculties()->detach();
            $teacher->delete();

            $new_teachers = Teacher::all();

            return view('components.teachers-list', ['teachers' => $new_teachers]);
        } catch (Exception $err) {
        }
    }
}
