<x-dashBoard.dash-board-home>
    @push('styles')
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    @endpush
    <x-slot:breadcrumbs>
        <x-dash-board.includes.breadcrumbs pageTilte="Invoices Page">
            <li class="breadcrumb-item"><a href="{{ route('invoices.index') }}">Invoices</a></li>
        </x-dash-board.includes.breadcrumbs>
    </x-slot:breadcrumbs>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>رقم الفاتوره</th>
                            <th>تاريخ الفاتوره</th>
                            <th>تاريخ الاستحقاق</th>
                            <th>المنتج</th>
                            <th>القسم</th>
                            <th>تاريخ الاستحقاق</th>
                            <th>الخصم</th>
                            <th>نسبه الضريبه</th>
                            <th>قيمه الضريبه</th>
                            <th>الاجمالى</th>
                            <th>الحاله</th>
                            <th>الملاحظات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2</td>
                            <td>All others</td>
                            <td>All others</td>
                            <td>All others</td>
                            <td>U</td>
                            <td>Other browsers</td>
                            <td>All others</td>
                            <td>All others</td>
                            <td>All others</td>
                            <td>U</td>
                            <td>All others</td>
                            <td>All others</td>
                            <td>U</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>All others</td>
                            <td>All others</td>
                            <td>All others</td>
                            <td>U</td>
                            <td>Other browsers</td>
                            <td>All others</td>
                            <td>All others</td>
                            <td>All others</td>
                            <td>U</td>
                            <td>All others</td>
                            <td>All others</td>
                            <td>U</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>10</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            <th>CSS grade</th>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            <th>CSS grade</th>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
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
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": true,
                    "ordering": true,
                    "paging": true,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            });
        </script>
    @endpush
</x-dashBoard.dash-board-home>
