<?php

namespace App\DataTables;

use App\Models\Invoice;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class InvoiceDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('action', function ($invoice) {

                $actions = "<div class=''>";
                if ($this->trash == null) {
                    $actions .= "<a href='/admin/invoices/edit/{$invoice->id}' style='outline:none;border:none;width:50px;height:50px' type='button' class='btn btn-default' ><i style='color:blue;' class='far fa-edit'></i></a> ";
                    // $actions .= "<a href='/invoices/delete-forever/{$invoice->id}' style='outline:none;border:none;width:50px;height:50px' type='button' class='btn btn-default m-2' ><i style='color:red;' class='far fa-trash-alt'></i></a>";
                    $actions .= "<a href='/admin/invoices/delete/{$invoice->id}' style='outline:none;border:none;width:50px;height:50px' type='button' class='btn btn-default m-2' ><i style='color:red;' class='fa fa-archive'></i></a>";
                    $actions .= "<input type='checkbox' name='id[]' value='{$invoice->id}'/>";
                } else {
                    $actions .= "<a href='/admin/invoices/restore/{$invoice->id}' style='outline:none;border:none;width:50px;height:50px' type='button' class='btn btn-default' ><i style='color:blue;' class='far fa-file'></i></a> ";
                    $actions .= "<a href='/admin/invoices/delete-forever/{$invoice->id}' style='outline:none;border:none;width:50px;height:50px' type='button' class='btn btn-default m-2' ><i style='color:red;' class='far fa-trash-alt'></i></a>";
                }
                $actions .= "</div> ";
                return $actions;

            })
            ->editColumn('invoice_number', function ($invoice) {
                return "<a href='/admin/invoices/details/$invoice->id'>$invoice->invoice_number</a>";
            })
            ->editColumn('product', function ($invoice) {


                return $invoice->product->product_name;
            })
            ->editColumn('section', function ($invoice) {
                return "<a href='/admin/invoices/sections/$invoice->section_id'>{$invoice->section->section_name}</a>";
            })
            ->editColumn("Status", function ($invoice) {
                $formate = "";
                if ($invoice->Value_Status == 2) {
                    $formate .= '<span class="badge badge-danger">' . $invoice->status . '</span>';
                } elseif ($invoice->Value_Status == 1) {
                    $formate .= '<span class="badge badge-success">' . $invoice->status . '</span>';
                } else {
                    $formate .= "<span class='badge badge-warning'>" . $invoice->status . "</span>";
                }
                return ($formate);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Invoice $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Invoice $model): QueryBuilder
    {

        return $model->newQuery()
            ->select("id", "invoice_number", "section_id", "product_id", "Amount_collection", "status", "Value_Status")
            ->when($this->section_id != null, function ($query) {
                $query->where('section_id', '=', $this->section_id);
            })
            ->when($this->trash != null, function ($query) {
                $query->onlyTrashed();
            })
            ->when($this->status != null, function ($query) {
                $query->where('Value_Status', '=', $this->status);
            })
            ->when($this->invoice_from_date && $this->invoice_to_date, function ($query) {
                $query->whereBetween('created_at', [$this->invoice_from_date, $this->invoice_to_date]);
            })
            ->when($this->invoice_number != null, function ($query) {
                $query->where('invoice_number', $this->invoice_number);
            })
            ->when($this->invoiceStatus, function ($query) {
                $query->where('Value_Status', $this->invoiceStatus);
            })
        ;
    }


    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('invoice-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make("Status"),
            Column::make('id'),
            Column::make('invoice_number'),
            Column::make('Amount_collection'),
            Column::make('product'),
            Column::make('section'),
            Column::make('action')->width("50px"),


        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Invoice_' . date('YmdHis');
    }
}
