<x-dashBoard.dash-board-home>
    <x-slot:breadcrumbs>
        <x-dash-board.includes.breadcrumbs pageTilte="الفواتير">
            <li class="breadcrumb-item active">قائمه الفواتير</li>

        </x-dash-board.includes.breadcrumbs>
    </x-slot:breadcrumbs>
    <div class="col-12">
        <x-dash-board.session-message-component type='success' />
        <x-dash-board.session-message-component type='danger' />

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">تعديل فاتوره</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.invoices.update') }}" method="POST">
                            @csrf
                            {{-- {{ $invoice->id }} --}}
                            <x-form.input type="hidden" name="id" id="invoice_id" value="{{ $invoice->id }}" />
                            @include('dashboard.invoices.__form')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-form.input class="rounded" type="date" name="Payment_Date" label="true"
                                            id="Payment_Date_id" labelName="تاريخ الدفع"
                                            value="{{ $invoice->Payment_Date }}" />
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleSelectRounded0">حاله الدفع</label>
                                        <select name="Paid_Status"
                                            class='custom-select rounded-0 @error('Paid_Status[]')  is-invalid @enderror'
                                            id="Paid_Status_id">
                                            <option value="{{ json_encode(['1', 'مدفوعه']) }}" selected>مدفوعه
                                            </option>
                                            <option value="{{ json_encode(['3', 'مدفوعه جزئيا']) }}">مدفوعه جزئيا
                                            </option>

                                        </select>
                                        <x-form.validation name="Paid_Status" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">تاريخ الانشاء</label>
                                        <span class="d-block">{{ $invoice->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">تاريخ التحديث</label>
                                        <span class="d-block">{{ $invoice->updated_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">تاريخ الدفع</label>
                                        <span class="d-block">{{ $invoice->Payment_Date ?? 'لم يتم الدفع بعد' }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for=""> المبلغ المدفوع</label>
                                        <span
                                            class="d-block">{{ $invoice->InvoiceDetails->last()->Amount_Paid ?? 0 }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for=""> المبلغ المتبقى</label>
                                        <span
                                            class="d-block">{{ $invoice->InvoiceDetails->last()->Amount_Remainder ?? 0 }}</span>
                                    </div>
                                </div>



                                <div class="row col-12 hidden" id="pay_form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <x-form.input class="rounded" type="number" name="Amount_Paid"
                                                label="true" id="Amount_Paid_id" labelName="المدفوع"
                                                value="{{ $invoice->Amount_Paid }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <x-form.input class="rounded" type="number" name="Amount_Remainder"
                                                label="true" id="Amount_Remainder_id" labelName="المتبقى"
                                                value="{{ $invoice->Amount_Remainder }}" />
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button style="color:black;" type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    </div>
    @push('scripts')
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- bs-custom-file-input -->
        <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
        <script>
            document.getElementById('invoice_Date_id').valueAsDate = new Date();
        </script>
        <script>
            // $('#modal-sm2').on(
            $('#Paid_Status_id').on('change', function() {
                var v = document.querySelector('#Paid_Status_id');
                var status = JSON.parse(v.value)[0];
                // console.log(status);
                let element = document.querySelector('#pay_form');
                if (status == 3) {
                    element.classList.remove('hidden');
                } else {
                    element.classList.add('hidden');
                    document.getElementById("Amount_Paid_id").value = ''
                    document.getElementById("Amount_Remainder_id").value = ''


                }
            });
        </script>
    @endpush

</x-dashBoard.dash-board-home>
