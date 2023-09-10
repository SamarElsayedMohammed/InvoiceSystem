<div class="row">
    <table class="table">
        <thead>
            <th>#</th>
            <th>رقم الفاتوره</th>
            <th>اسم المستخدم</th>
            <th>المنتج</th>
            <th>القسم</th>
            <th>حاله الدفع</th>
            <th>تاريخ الدفع</th>
        </thead>
        <tbody>
            @foreach ($invoice->InvoiceDetails as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->invoice_number }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->product->product_name }}</td>
                    <td>{{ $item->section->section_name }}</td>
                    <td>
                        @if ($item->Value_Status == 2)
                            <span class='badge badge-danger'>{{ $item->Status }}</span>
                        @elseif($item->Value_Status == 1)
                            <span class='badge badge-success'>{{ $item->Status }}</span>
                        @else
                            <span class='badge badge-warning'>{{ $item->Status }}</span>
                        @endif
                    </td>
                    {{ $item->Payment_Date }}
                    <td>{{ $item->Payment_Date ?? 'لم يتم الدفع بعد' }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>

</div>
