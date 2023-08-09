<?php

namespace App\View\Components\DashBoard;

use Illuminate\View\Component;

class DashBoardHome extends Component
{
    public $Title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($Title = "")
    {
        $this->Title=$Title ?? "Home Page";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dash-board.dash-board-home');
    }
}
