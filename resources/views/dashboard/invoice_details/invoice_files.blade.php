{{-- <div class="row"> --}}
<div class="card-body">
    <div class="row m-3 d-flex justify-content-between">
        <label class="col-4" for="">upload new File : </label>
        <form method="POST" class="col-8 d-flex justify-content-between " d
            action="{{ route('admin.invoice.file.uplode') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
            <input type="file" name="pic" class="rounded" required>
            </div>
            <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
            <button type="submit" class="btn btn-outline-success">upload</button>
        </form>
    </div>
    <table class="table">
        <thead>
            <th>#</th>
            <th>اسم الملف</th>
            <th> نوع الملف</th>
            <th> العمليات</th>
        </thead>
        <tbody>
            @foreach ($invoice->file as $item)
                <tr>
                    @php
                        $fie = explode('/', $item->file_name);
                    @endphp
                    <td>{{ $item->id }}</td>
                    <td>{{ end($fie) }}</td>
                    <td>{{ $item->type }}</td>
                    <td>
                        <div class="row">
                            <form method="POST" class="col-3" action="{{ route('admin.invoice.file.show') }}">
                                @csrf
                                <input type="hidden" name="file_name" value="{{ $item->file_name }}">
                                <button type="submit" class="btn btn-outline-success">Show</button>
                            </form>
                            <form method="POST" class="col-3" action="{{ route('admin.invoice.file.download') }}">
                                @csrf
                                <input type="hidden" name="file_name" value="{{ $item->file_name }}">
                                <button type="submit" class="btn btn-outline-warning">Download</button>
                            </form>
                            <form method="POST" class="col-3" action="{{ route('admin.invoice.file.delete') }}">
                                @csrf
                                <input type="hidden" name="file_id" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-outline-danger">delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
