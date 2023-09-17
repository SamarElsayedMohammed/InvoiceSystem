<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\DataTables\InvoiceDataTable;

class InvoiceReportsController extends Controller
{

    public function index(InvoiceDataTable $dataTable)
    {

        if (request()->ajax()) {
            return $dataTable->ajax()->content();
        }
        return view('dashboard.invoices-reports.index');
    }

    public function DateFilter(InvoiceDataTable $dataTable)
    {
        $from_date = (Carbon::parse(new \Carbon\Carbon(request()->from_Date)));
        $to_date = (Carbon::parse(new \Carbon\Carbon(request()->to_Date)));
        if (request()->ajax()) {
            return $dataTable
                ->with([
                    'invoice_from_date' => $from_date,
                    'invoice_to_date' => $to_date
                ])
                ->ajax()->content();
        }
        return view('dashboard.invoices-reports.filtering');
    }
    public function DateFilterByInvoiceNumber(InvoiceDataTable $dataTable)
    {

        if (request()->ajax()) {
            return $dataTable
                ->with([
                    'invoice_number' => request()->invoice_number,
                ])
                ->ajax()->content();
        }
        return view('dashboard.invoices-reports.filtering-invoice-number');
    }
    public function DateFilterByInvoiceStatus(InvoiceDataTable $dataTable)
    {
        // return request()->invoiceStatus;
        if (request()->ajax()) {
            return $dataTable
                ->with([
                    'invoiceStatus' => request()->invoiceStatus,
                ])
                ->ajax()->content();
        }
        return view('dashboard.invoices-reports.filtering-invoice-status');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
