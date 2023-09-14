<x-dashBoard.dash-board-home>
    <x-slot:breadcrumbs>
        <x-dash-board.includes.breadcrumbs pageTilte="الادوار">
            <li class="breadcrumb-item active">انشاء دور جديد</li>

        </x-dash-board.includes.breadcrumbs>
    </x-slot:breadcrumbs>
    <div class="col-12">
        <x-dash-board.session-message-component type='success' />
        <x-dash-board.session-message-component type='danger' />

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">انشاء دور جديد</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('admin.roles.store') }}" method="POST">
                    @csrf
                    @include('dashboard.roles.__form')
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                        <button style="color:rgb(255, 255, 255);" type="submit" class="btn btn-primary">حفظ</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>


</x-dashBoard.dash-board-home>
