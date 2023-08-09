<?php

namespace App\View\Components\DashBoard;

use Illuminate\View\Component;

class DashboardHome extends Component
{
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title=null)
    {
        $this->title = $title ?? "Home Page";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dash-board.dash-board-home', ['title' => $this->title]);
    }
}
