<?php

namespace App\DataTables;

use App\Models\Section;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SectionDataTable extends DataTable
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
            ->editColumn('action', function ($section) {
                $actions = "<div class='d-flex justify-content-between'>";

                $actions .= "<button style='outline:none;border:none;' type='button' class='btn btn-default' data-id='$section->id' data-section_name='$section->section_name' data-section_description='" . $section->description . "' data-toggle='modal' data-target='#modal-sm2'><i style='color:blue;' class='far fa-edit'></i></button> ";

                $actions .= "<button style='outline:none;border:none;' type='button' class='btn btn-default m-2' data-id='$section->id' data-section_name='$section->section_name ' data-description=' $section->description' data-toggle='modal' data-target='#modal-sm3'><i style='color:red;' class='far fa-trash-alt'></i></a>";
                $actions .= "</div> ";

                return $actions;
            })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Section $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Section $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('section-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
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
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::make('id'),
            Column::make('section_name'),
            Column::make('description'),
            Column::make('created_by'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Section_' . date('YmdHis');
    }
}
