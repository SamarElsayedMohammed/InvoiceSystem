<?php

namespace App\Exports;

use App\Models\Invoice;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Color;
use Maatwebsite\Excel\Concerns\WithBackgroundColor;


class InvoicesExport implements
    FromCollection,
    WithMapping,
    WithHeadings,
    WithStyles,
    WithDefaultStyles
    // ,WithBackgroundColor
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Invoice::all();
    }
    public function map($invoice): array
    {
        return [
            $invoice->id,
            $invoice->invoice_number,
            $invoice->invoice_Date,
            $invoice->Due_date,
            $invoice->Amount_collection,
            $invoice->Amount_Commission,
            $invoice->section->section_name,
            $invoice->product->product_name,
        ];
    }
    public function headings(): array
    {
        return [
            '#',
            'رقم الفاتوره',
            'تاريخ الانشاء',
            'تاريخ الدفع',
            'مبلغ التحصيل',
            'مبلغ العموله',
            'المنتج',
            'القسم'
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['size' => 12, 'italic' => true]],
        ];
    }
    public function defaultStyles(Style $defaultStyle)
    {
        // Configure the default styles
        return [
            'fill' => [
                'fillType' => Fill::FILL_GRADIENT_LINEAR,
                'startColor' => ['argb' => "#970C10"],
            ],
        ];
    }

}
