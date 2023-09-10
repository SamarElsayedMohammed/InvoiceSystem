<?php

namespace App\View\Components\Dashboard;

use App\Models\Product;
use Illuminate\View\Component;

class Products extends Component
{
    public $products;
    public function __construct($sectionId)
    {
        $this->products = Product::where("section_id", (int) $sectionId)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.products');
    }
}