<?php

namespace App\Listeners;

use App\Models\InvoicesDetails;
use App\Events\CreateInvoiceDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateInvoiceDetailsFired
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CreateInvoiceDetails  $event
     * @return void
     */
    public function handle(CreateInvoiceDetails $event)
    {
        $details = InvoicesDetails::create([
            'invoice_id' => $event->invoice->id,
            'invoice_number' => $event->invoice->invoice_number,
            'product_id' => $event->invoice->product_id,
            'Section_id' => $event->invoice->section_id,
            'Status' => $event->data['Status'],
            'Value_Status' => $event->data['Value_Status'],
            'note' => $event->invoice->note,
            'Amount_Paid' => $event->data['Amount_Paid'],
            'Amount_Remainder' => $event->data['Amount_Remainder'],
            'Payment_Date' => $event->invoice->Payment_Date,
            'user_id' => (Auth::id()),
        ]);

    }
}