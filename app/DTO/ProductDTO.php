<?php

namespace App\DTO;


class ProductDTO
{

    public int $section_id;
    public int $product_id;
    public string $product_name;
    public string $description;

    public function __construct(int $section_id, int $product_id, string $product_name, string $description)
    {
        $this->section_id = $section_id;
        $this->product_id = $product_id;
        $this->product_name = $product_name;
        $this->description = $description;
    }

}
