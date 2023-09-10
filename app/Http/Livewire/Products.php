<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $products = 0;
    public function getProducts()
    {
        // $this->products = Product::where("section_id", "=", 1)->get()->toArray();
        $this->products ++;
    }
    public function render()
    {
        return view('livewire.products');
    }
}
