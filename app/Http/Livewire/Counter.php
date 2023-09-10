<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Counter extends Component
{
    public $count = 0;

    public function increment($section)
    {
        // $this->count = Product::where("section_id", "=", $section)->get()->toArray();
        $this->count = $section;
    }
    public function render()
    {
        return view('livewire.counter');
    }
}