<x-dashBoard.dash-board-home>
    @push('styles')
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    @endpush
    <x-slot:breadcrumbs>
        <x-dash-board.includes.breadcrumbs pageTilte="الاقسام">
            <li class="breadcrumb-item active">قائمه الاقسام</li>

        </x-dash-board.includes.breadcrumbs>
    </x-slot:breadcrumbs>
    <div class="col-12">
        <x-dash-board.session-message-component type='success' />
        <x-dash-board.session-message-component type='danger' />

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">DataTable with default features</h3>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-sm">
                    انشاء قسم جديد
                </button>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-sm2">
                    تعديل قسم
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="datatable-crud" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> اسم القسم</th>
                            <th> ملاحظات</th>
                            <th> مضاف بواسطه </th>
                            <th> مضاف منذ</th>
                            <th> معدل منذ</th>
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
                    ajax: "{{ route('admin.sections.index') }}",
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'section_name',
                            name: 'section_name'
                        },
                        {
                            data: 'description',
                            name: 'description'
                        },
                        {
                            data: 'created_by',
                            name: 'created_by'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
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
