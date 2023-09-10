<?php

namespace App\DTO;

class InvoiceDTO
{

    public int $invoice_id;

    public string $invoice_number;

    public string $invoice_Date;

    public string $Due_date;

    public int $section_id;

    public int $product_id;

    public float $Amount_collection;

    public float $Amount_Commission;

    public float $Discount;

    public  $Value_VAT;

    public string $Rate_VAT;

    public float $Total;

    public string $Status;

    public $Value_Status;

    public string $note;

    public $Payment_Date;

    public string $deleted_at;


    function __construct(
        int $invoice_id, string $invoice_number, string $invoice_Date, string $Due_date, int $section_id, int $product_id, float $Amount_collection, float $Amount_Commission, float $Discount, string $Rate_VAT, float $Total, string $Status,
        $Value_Status, string $note,
        $Payment_Date,  $Value_VAT
    ) {
        $this->invoice_id = $invoice_id;
        $this->invoice_number = $invoice_number;
        $this->invoice_Date = $invoice_Date;
        $this->Due_date = $Due_date;
        $this->section_id = $section_id;
        $this->product_id = $product_id;
        $this->Amount_collection = $Amount_collection;
        $this->Amount_Commission = $Amount_Commission;
        $this->Discount = $Discount;
        $this->Rate_VAT = $Rate_VAT;
        $this->Status = $Status;
        $this->Value_Status = $Value_Status;
        $this->Total = $Total;
        $this->note = $note;
        $this->Payment_Date = $Payment_Date;
        $this->Value_VAT = $Value_VAT;
    }

}
