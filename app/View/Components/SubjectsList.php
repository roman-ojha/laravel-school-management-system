<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SubjectsList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $subjects;
    public function __construct($subjects)
    {
        $this->subjects = $subjects;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.subjects-list');
    }
}
