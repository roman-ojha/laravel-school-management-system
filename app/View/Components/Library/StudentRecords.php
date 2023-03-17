<?php

namespace App\View\Components\Library;

use Illuminate\View\Component;

class StudentRecords extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $library_students = [];
    public function __construct($libraryStudents)
    {
        $this->library_students = $libraryStudents;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.library.student-records');
    }
}
