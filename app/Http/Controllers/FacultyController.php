<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use Exception;

class FacultyController extends Controller
{
    public function faculties()
    {
        $faculties = Faculty::all();

        return view('pages.faculty.index', ['faculties' => $faculties]);
    }

    public function add_faculty(Request $req)
    {
        try {
            if (!$req->filled('name')) {
                return view('pages.faculty.add_faculty', ['error' => "All field is required"]);
            }
            $faculty = new Faculty();
            $faculty->name = $req->input('name');
            $saved = $faculty->save();
            if (!$saved) {
                return view('pages.faculty.add_faculty', ['error' => "Server Error!!!"]);
            }
            return redirect()->route('faculties');
        } catch (Exception $err) {
            return view('pages.faculty.add_faculty', ['error' => "Server Error!!!"]);
        }
    }

    public function delete_faculty(Request $req, $id)
    {
        $faculty = Faculty::find($id);
        $faculty->teachers()->detach();
        $faculty->delete();
        $faculties = Faculty::all();
        return view('components.faculties-list', ['faculties' => $faculties]);
    }
}
