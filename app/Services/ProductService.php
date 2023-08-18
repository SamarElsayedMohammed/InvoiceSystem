<?php

namespace App\Services;

use App\DTO\ProductDTO;
use App\Models\Section;
use App\Interfaces\ServicesInterface;
use App\Models\Product;

class ProductService implements ServicesInterface
{

    public function CreateDTO($ProductData): ProductDTO
    {
        return new ProductDTO(
            $ProductData->input('section_id'),
            $ProductData->input('product_id'),
            $ProductData->input('product_name'),
            $ProductData->input('description'),
        );

    }
    public function CreateOrUpdate($ProductData): Product
    {
        $newProduct = Product::updateOrCreate(
            ['id' => $ProductData->product_id],
            [
                'product_name' => $ProductData->product_name,
                'description' => $ProductData->description,
                'section_id' => $ProductData->section_id,

            ]
        );
        return $newProduct;
    }

    public function FindById($id)
    {
        $product = Product::find($id);

        return $product;
    }

}