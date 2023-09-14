<x-dashBoard.dash-board-home>
    <x-slot:breadcrumbs>
        <x-dash-board.includes.breadcrumbs pageTilte="الادوار">
            <li class="breadcrumb-item active">قائمه الادوار</li>

        </x-dash-board.includes.breadcrumbs>
    </x-slot:breadcrumbs>
    <div class="col-12">
        <x-dash-board.session-message-component type='success' />
        <x-dash-board.session-message-component type='danger' />

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">User DataTable</h3>
                <a type="button" class="btn btn-default" href="{{ route('admin.roles.create') }}">
                    انشاء دور جديد
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="datatable-crud" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th> العمليان</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td><a href="/admin/roles/edit/{{ $item->id }}" type='button'
                                        class="btn btn-warning pr-2 pl-2"><i style='color:rgb(3, 3, 3);'
                                            class='far fa-edit'></i></a> <a
                                        href="/admin/roles/delete/{{ $item->id }}" type='button'
                                        class='btn btn-danger pr-2 pl-2'><i style='color:rgb(255, 255, 255);'
                                            class='far fa-trash-alt'></i></a></td>
                            </tr>
                        @endforeach

                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    {{-- @include('dashboard.sections.delete') --}}

    @push('scripts')
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
