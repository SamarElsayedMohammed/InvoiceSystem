<?php

namespace App\Http\Controllers;

use App\Enums\MessagesEnum;
use App\Traits\WebResponce;
use Illuminate\Http\Request;
use App\DataTables\ProductsDataTable;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\SectionRequset;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    use WebResponce;
    private ProductRepository $ProductRepository;

    public function __construct(ProductRepository $ProductRepository)
    {
        $this->ProductRepository = $ProductRepository;
    }

    public function index(ProductsDataTable $dataTable)
    {

        if (request()->ajax()) {
            return $dataTable->ajax()->content();
        }
        return view('dashboard.products.index');

    }

    public function store(ProductRequest $request)
    {
        try {

        $this->ProductRepository->StoreNew($request);

        return $this->success("Item created ", 'admin.products.index');
        } catch (\Exception $e) {
            return $this->error(MessagesEnum::CodeError, "admin.products.index");

        }
    }
    public function update(ProductRequest $request)
    {
        //  return $request;
        try {

            $section = $this->ProductRepository->Update($request);
            return $this->success(MessagesEnum::UpdatetItem, 'admin.products.index');

        } catch (\Exception $e) {
            return $this->error($e->getMessage(), "admin.products.index");

        }

    }

    public function destroy(Request $request)
    {
        try {
            $this->ProductRepository->Delete($request->product_id);
            return $this->success(MessagesEnum::DeletItem, 'admin.products.index');

        } catch (\Exception $e) {
            return $this->error($e->getMessage(), "admin.products.index");

        }
    }
}