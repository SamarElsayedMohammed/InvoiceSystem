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
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> اسم القسم</th>
                            <th> ملاحظات</th>
                            <th> العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2</td>
                            <td>All others</td>
                            <td>All others</td>
                            <td>
                                <div class="row">
                                    <button type="button" class="col-3 btn-xs mr-2 btn  btn-primary">التعديلات</button>
                                    <button type="button" class="col-3 btn-xs btn  btn-danger">حذف</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>All others</td>
                            <td>All others</td>
                            <td>
                                <div class="row">
                                    <button type="button" class="col-3 btn-xs mr-2 btn  btn-primary">التعديلات</button>
                                    <button type="button" class="col-3 btn-xs btn  btn-danger">حذف</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>10</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>

                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    <div class="modal fade " id="modal-sm">
        <div class="modal-dialog modal-sm">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">اضافه قسم</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('admin.sections.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            {{-- <label for="exampleInputEmail1">اسم القسم</label>
                            <input type="text" name="section_name" class="form-control" id="exampleInputEmail1"
                                placeholder="اسم القسم"> --}}
                            <x-form.input type="text" name="section_name" label="true" id="section_name_id"
                                labelName="اسم القسم" />

                        </div>
                        <div class="form-group">

                            <x-form.textarea name="description" label="true" id="description_id" labelName=" الوصف" />
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
