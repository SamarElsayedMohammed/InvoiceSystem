<x-dashBoard.dash-board-home>
    <x-slot:breadcrumbs>
        <x-dash-board.includes.breadcrumbs pageTilte="التقارير">
            <li class="breadcrumb-item active">قائمه التقارير</li>

        </x-dash-board.includes.breadcrumbs>
    </x-slot:breadcrumbs>
    <div class="col-12">
        <x-dash-board.session-message-component type='success' />
        <x-dash-board.session-message-component type='danger' />
        {{-- @csrf --}}
        <div class="card">
            <div class="card-header">


                <div class="row ">
                    <div class="col-12 d-flex justify-content-end">
                        <a href="{{ route('admin.invoices.export') }}" type="button"
                            class="btn btn-default align-self-start">
                            تصدير ملف اكسيل
                        </a>
                    </div>
                </div>
                <form action="{{ route('admin.invoices.reports.filter') }}" class="row ">

                    <div class="col-5 mt-3 ">

                        <div class="form-group">
                            <x-form.input class="rounded" type="date" name="from_Date" label="true"
                                id="from_Date_id" labelName="من تاريخ" value="" />
                        </div>

                    </div>
                    <div class="col-5 mt-3">

                        <div class="form-group">
                            <x-form.input class="rounded" type="date" name="to_Date" label="true" id="to_Date_id"
                                labelName="الى تاريخ" value="" />
                        </div>

                    </div>
                    <div class="col-2 mt-5">

                        <div class="form-group">
                            <input class="form-control rounded" type="submit" label="true" value="بحث" />
                        </div>

                    </div>
                </form>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <form action="{{ route('admin.invoices.reports.Filter.By.Invoice.Number') }}" class="row">
                            <div class="col-9 mt-3 ">

                                <div class="form-group">
                                    <x-form.input class="rounded" type="text" name="invoice_number" label="true"
                                        id="invoice_number_id" labelName="رقم الفاتوره" value="" />
                                </div>

                            </div>

                            <div class="col-2 mt-5">

                                <div class="form-group">
                                    <input class="form-control rounded" type="submit" label="true" value="بحث" />
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="col-6">
                        <form action="{{ route('admin.invoices.reports.Filter.By.Invoice.Status') }}" class="row">
                            <div class="col-9 mt-3 ">

                                <div class="form-group">
                                    <label for="exampleSelectRounded0">اختر نوع الفاتوره</label>
                                    <select name="status_id"
                                        class='custom-select rounded-0 @error('status_id') is-invalid @enderror'
                                        id="exampleSelectRounded0">
                                        <option value="1">مدفوعه</option>
                                        <option value="2">غير مدفوعه</option>
                                        <option value="3">مدفوعه جزئيا</option>

                                    </select>
                                    <x-form.validation name="status_id" />
                                </div>


                            </div>

                            <div class="col-2 mt-5">

                                <div class="form-group">
                                    <input class="form-control rounded" type="submit" label="true" value="بحث" />
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                {{-- </div> --}}
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="datatable-crud" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>رقم الفاتوره</th>
                            <th> المنتج</th>
                            <th> القسم</th>
                            <th> مبلغ التحصيل</th>
                            <th> الحاله</th>
                            <th> العمليان</th>

                        </tr>
                    </thead>
                    <tbody>

                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    @include('dashboard.sections.create')
    @include('dashboard.sections.edit')
    @include('dashboard.sections.delete')

    @push('scripts')
        <!-- DataTables  & Plugins -->
        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
        <!-- AdminLTE App -->
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('dist/js/demo.js') }}"></script>
        <!-- Page specific script -->
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#datatable-crud').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "/admin/invoice-filter?from_Date={{ request()->from_Date }}&to_Date={{ request()->to_Date }}",
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'invoice_number',
                            name: 'invoice_number'
                        },
                        {
                            data: 'product',
                            name: 'product'
                        },
                        {
                            data: 'section',
                            name: 'section'
                        },
                        {
                            data: 'Amount_collection',
                            name: 'Amount_collection'
                        },
                        {
                            data: 'Status',
                            name: 'Status'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        },
                    ],
                    order: [
                        [0, 'desc']
                    ]
                });
            });
        </script>
        <script>
            $('#modal-sm2').on('shown.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                var section_name = button.data('section_name')
                var section_description = button.data('section_description')
                var modal = $(this)
                document.getElementById('section_id').value = id;
                modal.find('.modal-body #section_name_id').val(section_name);
                modal.find('.modal-body #description_id').val(section_description);
            });
        </script>
        <script>
            $('#modal-sm3').on('shown.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                // console.log(id);
                var section_name = button.data('section_name')
                var modal = $(this)
                document.getElementById('delete_section_id').value = id;
                document.getElementById('delete_section_name_id').textContent = " حذف القسم : " + section_name

            });
        </script>
    @endpush
</x-dashBoard.dash-board-home>
