<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StudentsList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $students;
    public function __construct($students)
    {
        $this->students = $students;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.students-list');
    }
}
