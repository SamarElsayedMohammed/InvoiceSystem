<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Invoice;
use App\Traits\WebResponce;
use Illuminate\Http\Request;
use App\Services\FileService;
use Illuminate\Support\Facades\Storage;

class InvoiceFilesController extends Controller
{
    use WebResponce;
    private FileService $fileService;
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }
    public function show(Request $request)
    {
        $file = storage_path("/app/public/" . $request->file_name);
        return response()->file($file);
    }
    public function downloadFile(Request $request)
    {
        $file = storage_path("/app/public/" . $request->file_name);
        return response()->download($file);
    }

    public function DeleteFile(Request $request)
    {

        $file = File::find($request->file_id);
        $file->delete();

        return $this->success("Item Deleted ", 'admin.invoices.index');

    }

    function UploadImage(Request $request)
    {
        // return $request;
        $invoice = Invoice::find($request->invoice_id);
        $this->fileService->CreateFile($request->file('pic'), $invoice);

        return $this->success("Item uploaded ", 'admin.invoices.index');

    }

}
