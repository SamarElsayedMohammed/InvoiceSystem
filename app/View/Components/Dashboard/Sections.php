<?php

namespace App\View\Components\Dashboard;

use App\Models\Section;
use Illuminate\View\Component;

class Sections extends Component
{
    public $sections;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->sections = Section::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sections');
    }
}