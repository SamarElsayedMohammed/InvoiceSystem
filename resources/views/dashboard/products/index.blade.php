<x-dashBoard.dash-board-home>
    @push('styles')
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    @endpush
    <x-slot:breadcrumbs>
        <x-dash-board.includes.breadcrumbs pageTilte="المنتجات">
            <li class="breadcrumb-item active">قائمه المنتجات</li>

        </x-dash-board.includes.breadcrumbs>
    </x-slot:breadcrumbs>
    <div class="col-12">
        <x-dash-board.session-message-component type='success' />
        <x-dash-board.session-message-component type='danger' />

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-sm">
                    انشاء منتج جديد
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="datatable-crud" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>سريال</th>
                            <th> اسم المنتج</th>
                            <th> ملاحظات</th>
                            <th> اسم القسم</th>
                            <th> العمليان</th>

                        </tr>
                    </thead>
                    <tbody>

                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    @include('dashboard.products.create')
    @include('dashboard.products.edit')
    @include('dashboard.products.delete')

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
                    ajax: "{{ route('admin.products.index') }}",
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'product_name',
                            name: 'product_name'
                        },
                        {
                            data: 'description',
                            name: 'description'
                        },
                        {
                            data: 'section_id',
                            name: 'section_id'
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
                var product_name = button.data('product_name')
                var product_description = button.data('product_description')
                var modal = $(this)
                document.getElementById('product_id').value = id;
                modal.find('.modal-body #product_name_id').val(product_name);
                modal.find('.modal-body #description_id').val(product_description);
            });
        </script>
        <script>
            $('#modal-sm3').on('shown.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                // console.log(id);
                var product_name = button.data('product_name')
                var modal = $(this)
                document.getElementById('delete_product_id').value = id;
                document.getElementById('delete_product_name_id').textContent = " حذف المنتج : " + product_name

            });
        </script>
    @endpush
</x-dashBoard.dash-board-home>
