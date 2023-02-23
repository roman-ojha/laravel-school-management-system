<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BookSelfBookList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $book_self = [];
    public function __construct($bookSelf)
    {
        $this->book_self = $bookSelf;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.book-self-book-list');
    }
}
