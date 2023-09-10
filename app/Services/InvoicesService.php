<?php

namespace App\Services;

use App\DTO\InvoiceDTO;
use App\Interfaces\ServicesInterface;
use App\Models\Invoice;

class InvoicesService implements ServicesInterface
{

    public function CreateDTO($InvoiceData)
    {

        return new InvoiceDTO(
            $InvoiceData->input('id') ?? 0,
            $InvoiceData->input('invoice_number'),
            $InvoiceData->input('invoice_Date'),
            $InvoiceData->input('Due_date'),
            (int) $InvoiceData->input('section_id'),
            (int) $InvoiceData->input('product_id'),
            (float) $InvoiceData->input('Amount_collection'),
            (float) $InvoiceData->input('Amount_Commission'),
            (float) $InvoiceData->input('Discount'),
            $InvoiceData->input('Rate_VAT'),
            (float) $InvoiceData->input('Total'),
            $InvoiceData->input('Status') ?? "غير مدفوعه",
            $InvoiceData->input('Value_Status') ?? 2,
            (string) $InvoiceData->input('note'),
            $InvoiceData->input('Payment_Date') ?? null,
            (float) $InvoiceData->input('Value_VAT'),
        );

    }
    public function CreateOrUpdate($InvoiceData): Invoice
    {
        // dd ($InvoiceData->Payment_Date);
        $newInvoice = Invoice::updateOrCreate(
            ['id' => $InvoiceData->invoice_id],
            [
                'invoice_number' => $InvoiceData->invoice_number,
                'invoice_Date' => $InvoiceData->invoice_Date,
                'Due_date' => $InvoiceData->Due_date,
                'section_id' => $InvoiceData->section_id,
                'product_id' => $InvoiceData->product_id,
                'Amount_collection' => $InvoiceData->Amount_collection,
                'Amount_Commission' => $InvoiceData->Amount_Commission,
                'Discount' => $InvoiceData->Discount,
                'Rate_VAT' => $InvoiceData->Rate_VAT,
                'Status' => $InvoiceData->Status,
                'Value_Status' => $InvoiceData->Value_Status,
                'Total' => $InvoiceData->Total,
                'note' => $InvoiceData->note,
                'Payment_Date' => $InvoiceData->Payment_Date,
                'Value_VAT' => $InvoiceData->Value_VAT,

            ]
        );
        return $newInvoice;
    }

    public function FindById($id)
    {
        return Invoice::find($id);


    }

}