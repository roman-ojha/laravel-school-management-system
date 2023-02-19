<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FacultiesList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $faculties;
    public function __construct($faculties)
    {
        $this->faculties = $faculties;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.faculties-list');
    }
}
