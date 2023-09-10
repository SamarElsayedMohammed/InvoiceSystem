<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Notification extends Component
{
    public $notifications;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $user = User::find(Auth::id());
        $this->notifications = $user->unreadNotifications;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notification');
    }
}