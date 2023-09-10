<x-dashBoard.dash-board-home>
    <x-slot:breadcrumbs>
        <x-dash-board.includes.breadcrumbs pageTilte="الفواتير">
            <li class="breadcrumb-item active">قائمه الفواتير</li>

        </x-dash-board.includes.breadcrumbs>
    </x-slot:breadcrumbs>
    <div class="col-12">
        <x-dash-board.session-message-component type='success' />
        <x-dash-board.session-message-component type='danger' />

        <div class="card">


            <!-- /.card-header -->
            <div class="card-body">
                <table id="datatable-crud" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>رقم الفاتوره</th>
                            <th>تاريخ الانشاء</th>
                            <th>تاريخ الدفع</th>
                            <th> القسم</th>
                            <th> المنتج</th>
                            <th> مبلغ التحصيل</th>
                            <th> العموله</th>
                            <th> الخصم</th>
                            <th>%</th>
                            <th> الكلى</th>
                            <th> الحاله</th>
                            <th> تم لواسطه</th>
                            <th> حذف بواسطه</th>



                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logCollection as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->invoice_number }}</td>
                                <td>{{ $item->invoice_Date }}</td>
                                <td>{{ $item->Due_date }}</td>
                                <td>{{ $item->section }}</td>
                                <td>{{ $item->product }}</td>
                                <td>{{ $item->Amount_collection }}</td>
                                <td>{{ $item->Amount_Commission }}</td>
                                <td>{{ $item->Discount }}</td>
                                <td>{{ $item->Rate_VAT }}</td>
                                <td>{{ $item->Total }}</td>
                                <td>{{ $item->Status }}</td>
                                <td>{{ $item->created_by }}</td>
                                <td>{{ $item->deleted_by }}</td>
                            </tr>
                        @endforeach
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>


</x-dashBoard.dash-board-home>
