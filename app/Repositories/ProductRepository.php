<?php

namespace App\Repositories;

use Exception;
use App\Enums\MessagesEnum;
use App\Interfaces\CRUDInterface;
use App\Services\ProductService;

class ProductRepository implements CRUDInterface
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function GetById(int $id)
    {

    }
    public function GetAlls()
    {

    }

    public function StoreNew($ProductData)
    {
        $ProductData = $this->productService->CreateDTO($ProductData);

        return $this->productService->CreateOrUpdate($ProductData);

    }

    public function Update($ProductData)
    {

        $ProductData = $this->productService->CreateDTO($ProductData);
        $Product = $this->productService->FindById($ProductData->product_id);
        if ($Product != null) {
            return $this->productService->CreateOrUpdate($ProductData);
        }
        throw new Exception("Item NOt FOund");
    }

    public function Delete(int $id)
    {
        $Product = $this->productService->FindById($id);
        if ($Product != null) {
            return $Product->delete();
        }
        throw new Exception("Item NOt FOund");

    }

    public function DeleteAll()
    {

    }
}