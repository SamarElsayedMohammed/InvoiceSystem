<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\DataTables\InvoiceDataTable;
use Illuminate\Support\Facades\Auth;

class InvoicesDetailsController extends Controller
{
    public function index($id)
    {
        $notification_id = request('id') ?? 0;
        $user = User::find(Auth::id());
        $notification = $user->unreadNotifications()->where('id', "=", $notification_id)->first();
        if ($notification) {
            $notification->markAsRead();
        }
        $invoice = Invoice::with([
            "InvoiceDetails" => function ($query) {
                $query->with("user");
            },
            "file"
        ])->find($id);
        return view("dashboard.invoices.details", compact("invoice"));
    }


    public function SectionInvoices(InvoiceDataTable $dataTable, $section_id)
    {
        if (request()->ajax()) {
            return $dataTable->with('section_id', $section_id)->ajax()->content();

        }
        return view('dashboard.invoices.filtering');
    }

    public function PrintInvoice($id)
    {
        $invoice = Invoice::with([
            "InvoiceDetails" => function ($query) {
                $query->with("user");
            },
            "file"
        ])->find($id);
        return view("dashboard.invoice_details.details", compact("invoice"));
    }

    public function MarkAllReaded()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }

}