<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RentLogTable extends Component
{
    public $rentlog;
    public $title;

    /**
     * Create a new component instance.
     *
     * @param mixed $rentlog
     * @return void
     */
    public function __construct($rentlog, $title)
    {
        $this->rentlog = $rentlog;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.rent-log-table');
    }
}
