<x-dashBoard.dash-board-home>
    <x-slot:breadcrumbs>
        <x-dash-board.includes.breadcrumbs pageTilte="الفواتير">
            <li class="breadcrumb-item active">قائمه الفواتير</li>

        </x-dash-board.includes.breadcrumbs>
    </x-slot:breadcrumbs>
    <div class="col-12">
        <x-dash-board.session-message-component type='success' />
        <x-dash-board.session-message-component type='danger' />

        <form action="{{ route('admin.invoices.Archive.All') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header d-flex flex-row justify-content-between">
                    <a href="{{ route('admin.invoices.create') }}" type="button" class="btn btn-default align-self-end">
                        انشاء فاتوره
                    </a>
                    <input class="btn btn-outline-primary" type="submit" value="ارشفه الكل">

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
        </form>
    </div>

    @include('dashboard.sections.create')
    @include('dashboard.sections.edit')
    @include('dashboard.sections.delete')

    @push('scripts')
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
                    ajax: "{{ route('admin.invoices.status', Request::route('status')) }}",
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
