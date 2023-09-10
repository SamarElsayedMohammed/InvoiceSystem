<?php

namespace App\Repositories;

use Exception;
use App\DTO\FileDTO;
use App\Enums\MessagesEnum;
use App\Services\FileService;
use App\Events\CreateFileEvent;
use App\Interfaces\CRUDInterface;
use App\Services\InvoicesService;
use App\Events\CreateInvoiceDetails;

class InvoiceRepository implements CRUDInterface
{
    private InvoicesService $invoiceService;
    private FileService $fileService;
    public function __construct(InvoicesService $invoiceService, FileService $fileService)
    {
        $this->invoiceService = $invoiceService;
        $this->fileService = $fileService;
    }
    public function GetById(int $id)
    {
        $invoice = $this->invoiceService->FindById($id);
        if ($invoice) {
            $invoice->load(["file", "InvoiceDetails"]);
            return $invoice;
        }
        throw new Exception("Item NOt FOund");


    }
    public function GetAlls()
    {

    }

    public function StoreNew($invoiceData)
    {
        // return $invoiceData;

        $InvoiceData = $this->invoiceService->CreateDTO($invoiceData);

        $invoice = $this->invoiceService->CreateOrUpdate($InvoiceData);

        $data = [
            'Status' => "غير مدفوعه",
            'Value_Status' => '2',
            'Amount_Paid' => null,
            'Amount_Remainder' => null,
        ];

        CreateInvoiceDetails::dispatch($invoice, $data);

        if ($invoiceData->hasFile('pic')) {

            $this->fileService->CreateFile($invoiceData->file('pic'), $invoice);

        }

        return $invoice;

    }

    public function Update($invoiceData)
    {

        $InvoiceData = $this->invoiceService->CreateDTO($invoiceData);
        $Invoice = $this->invoiceService->FindById($InvoiceData->invoice_id);
        $invoice = $this->invoiceService->CreateOrUpdate($InvoiceData);
        $data = [
            'Status' => $invoiceData->Status,
            'Value_Status' => $invoiceData->Value_Status,
            'Amount_Paid' => $invoiceData->Amount_Paid,
            'Amount_Remainder' => $invoiceData->Amount_Remainder,
        ];
        CreateInvoiceDetails::dispatch($invoice, $data);


        return $invoice;
    }

    public function Delete(int $id)
    {
        $Product = $this->invoiceService->FindById($id);
        if ($Product != null) {
            return $Product->delete();
        }
        throw new Exception("Item NOt FOund");

    }

    public function DeleteAll()
    {

    }

    public function CreateInvoiceAttachments()
    {

    }
}