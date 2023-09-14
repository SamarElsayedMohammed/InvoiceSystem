<?php

namespace App\Http\Controllers;

use App\DTO\FileDTO;
use App\Models\File;
use App\Models\User;
use App\DTO\InvoiceDTO;
use App\DTO\ProductDTO;
use App\Models\Invoice;
use App\Traits\FileTrait;
use App\Traits\WebResponce;
use Illuminate\Http\Request;
use App\Events\CreateFileEvent;
use App\Services\InvoicesService;
use Illuminate\Support\Facades\Log;
use App\DataTables\InvoiceDataTable;
use App\Events\CreateInvoiceDetails;
use App\Exports\InvoicesExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\InvoiceRequest;
use App\Notifications\InvoiceCreated;
use App\Repositories\InvoiceRepository;

class InvoicesController extends Controller
{
    use WebResponce, FileTrait;

    private InvoiceRepository $invoiceRepository;
    function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
        $this->middleware('permission:invoice-list|invoice-create|invoice-edit|invoice-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:invoice-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:invoice-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:invoice-delete', ['only' => ['destroy']]);
    }

    public function index(InvoiceDataTable $dataTable)
    {

        if (request()->ajax()) {
            return $dataTable->ajax()->content();
        }
        return view('dashboard.invoices.index');
    }

    public function create()
    {
        $invoice = new Invoice();
        return view('dashboard.invoices.create', compact('invoice'));
    }

    public function store(InvoiceRequest $request)
    {

        $invoice = $this->invoiceRepository->StoreNew($request);
        $user = User::find(Auth::id());
        $user->notify(new InvoiceCreated($invoice));
        return $this->success("Item created ", 'admin.products.index');


    }

    public function show($id)
    {
        return $this->invoiceRepository->GetById($id);
    }

    public function edit($id)
    {
        $invoice = $this->invoiceRepository->GetById($id);
        return view('dashboard.invoices.edit', compact('invoice'));

    }

    public function update(InvoiceRequest $request)
    {
        $s = json_decode($request->Paid_Status);
        $request->merge([
            'Status' => $s[1],
            'Value_Status' => $s[0]
        ]);
        // return $request;
        $this->invoiceRepository->Update($request);
        return $this->success("Item updated ", 'admin.invoices.index');
    }


    public function destroy($id)
    {
        $this->invoiceRepository->Delete($id);
        return $this->success("Item Deleted ", 'admin.invoices.index');

    }

    public function ArchivedInvoice(InvoiceDataTable $dataTable)
    {

        if (request()->ajax()) {
            return $dataTable->with('trash', 1)->ajax()->content();
        }
        return view('dashboard.invoices.archived');
    }

    public function RestoreInvoice($id)
    {
        Invoice::withTrashed()
            ->where('id', $id)
            ->restore();

        return redirect()->back()->with("success", "Item resored");
    }

    public function DeleteForeverInvoice($id)
    {

        $invoice = Invoice::withTrashed()->with([
            "InvoiceDetails" => function ($query) {
                $query->with("user");
            },
            "file"
        ])->find($id);
        $data = [
            'invoice_number' => $invoice->invoice_number,
            'invoice_Date' => $invoice->invoice_Date,
            'Due_date' => $invoice->Due_date,
            'section' => $invoice->section->section_name,
            'product' => $invoice->product->product_name,
            'Amount_collection' => $invoice->Amount_collection,
            'Amount_Commission' => $invoice->Amount_Commission,
            'Discount' => $invoice->Discount,
            'Value_VAT' => $invoice->Value_VAT,
            'Rate_VAT' => $invoice->Rate_VAT,
            'Total' => $invoice->Total,
            'Status' => $invoice->Status,
            'Payment_Date' => $invoice->Payment_Date,
            'created_by' => $invoice->InvoiceDetails->last()->user->name,
            'deleted_by' => Auth::user()->name,
        ];
        Log::channel('webtutorlog')->info(json_encode($data));
        $invoice->forceDelete();
        return redirect()->back()->with("success", "Item Deleted Forever");

    }

    public function ShowDeletedActions()
    {
        $logFile = file(storage_path() . '/logs/applicationlog.log');
        $logCollection = [];
        // Loop through an array, show HTML source as HTML source; and line numbers too.
        foreach ($logFile as $line_num => $line) {
            $r = explode("local.INFO: ", $line);
            $data = json_decode(end($r));
            $logCollection[] = $data;
        }
        // dd($logCollection);
        return view('dashboard.invoice_details.history', compact('logCollection'));

    }

    public function SatatusInvoice(InvoiceDataTable $dataTable, $status)
    {

        if (request()->ajax()) {
            return $dataTable->with('status', $status)->ajax()->content();
        }
        return view('dashboard.invoices.status-filter');
    }

    public function ArchiveAll(Request $request)
    {
        // return $request->id;
        foreach ($request->id as $id) {
            $this->invoiceRepository->Delete($id);
        }
        return redirect()->back()->with("success", "All Item Archived");


    }


    public function export()
    {
        // return Invoice::all();
        return Excel::download(new InvoicesExport, 'invoices.xlsx');
    }

}
