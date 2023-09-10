<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Section;
use Livewire\Component;

class GetProducts extends Component
{
    public $invoice;
    public $sections;
    public $products = null;
    public $sectionId = null;
    public $selectedCity;

    // public function getProducts($id)
    // {
    //     $this->sectionId = $id;
    //     $this->products = Product::where("section_id", $this->sectionId)->get();
    // }

    public function render()
    {
        $this->sections = Section::all();
        $this->products = Product::where("section_id", $this->sectionId)->get();

        return view('livewire.get-products', [
            "invoice" => $this->invoice
        ]);
    }
}
