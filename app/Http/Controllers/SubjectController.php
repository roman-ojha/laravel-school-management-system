<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use Exception;
use App\Models\Faculty;

class SubjectController extends Controller
{
    public function subjects()
    {
        $subjects = Subject::all();

        return view('pages.subject.index', ["subjects" => $subjects]);
    }

    public function get_subjects_and_faculties_api()
    {
        $subjects = Subject::select(["id", "name"])->get();
        $faculties = Faculty::select(["id", "name"])->get();
        return ['subjects' => $subjects, 'faculties' => $faculties];
    }

    public function add_subject(Request $req)
    {
        try {
            if (!$req->filled('name')) {
                return view('pages.subject.add_subject', ['error' => "All field is required"]);
            }
            $subject = new Subject();
            $subject->name = $req->input('name');
            $saved = $subject->save();
            if (!$saved) {
                return view('pages.subject.add_subject', ['error' => "Server Error!!!"]);
            }
            return redirect()->route('subjects');
        } catch (Exception $err) {
            return view('pages.subject.add_subject', ['error' => "Server Error!!!"]);
        }
    }

    public function delete_subject(Request $req, $id)
    {
        try {
            $subject = Subject::find($id);
            $subject->teachers()->detach();
            $subject->delete();
            $new_subject = Subject::all();
            return view('components/subjects-list', ['subjects' => $new_subject]);
        } catch (Exception $err) {
        }
    }
}
