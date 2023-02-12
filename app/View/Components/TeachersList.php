<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TeachersList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $teachers;
    public function __construct($teachers)
    {
        $this->teachers = $teachers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.teachers-list');
    }
}
