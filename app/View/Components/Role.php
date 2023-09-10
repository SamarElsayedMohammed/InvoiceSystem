<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Spatie\Permission\Models\Role as SRole;

class Role extends Component
{
    public $roles;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->roles = SRole::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.role');
    }
}