<x-dashBoard.dash-board-home>
    <x-slot:breadcrumbs>
        <x-dash-board.includes.breadcrumbs pageTilte="الفواتير">
            <li class="breadcrumb-item active"> فاصيل الفاتوره</li>
            <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i
                class="mdi mdi-printer ml-1"></i>طباعة</button>

        </x-dash-board.includes.breadcrumbs>
    </x-slot:breadcrumbs>
    
    <div class="col-12">
        <x-dash-board.session-message-component type='success' />
        <x-dash-board.session-message-component type='danger' />
        
        <div class=" main-content-body-invoice" style="height: 60vh" id="print">
          
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">رقم الفاتوره</label>
                                <span class="d-block">{{ $invoice->invoice_number }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">تاريخ الانشاء</label>
                                <span class="d-block">{{ $invoice->invoice_Date }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">تاريخ الدفع</label>
                                <span class="d-block">{{ $invoice->Due_date }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">القسم</label>
                                <span class="d-block">{{ $invoice->section->section_name }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">المنتج</label>
                                <span class="d-block">{{ $invoice->product->product_name }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">مبلغ التحصيل</label>
                                <span class="d-block">{{ $invoice->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">العموله</label>
                                <span class="d-block">{{ $invoice->Amount_collection }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">الخصم</label>
                                <span class="d-block">{{ $invoice->Amount_Commission }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">الخصم</label>
                                <span class="d-block">{{ $invoice->Discount }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">نسبه الخصم</label>
                                <span class="d-block">{{ $invoice->Rate_VAT }} %</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">مبلغ الخصم</label>
                                <span class="d-block">{{ $invoice->Value_VAT }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">المبغ الكلى </label>
                                <span class="d-block">{{ $invoice->Total }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">الحاله</label>
                                <span class="d-block">{{ $invoice->Status }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""> تاريخ الدفع الفعلى </label>
                                <span class="d-block">{{ $invoice->Payment_Date ?? 'لم يتم الدفع بعد' }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">تم انشاء بواسطه</label>
                                <span class="d-block">{{ $invoice->InvoiceDetails->last()->user->name }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">المبلغ المتبقى</label>
                                <span
                                    class="d-block">{{ $invoice->InvoiceDetails->last()->Amount_Remainder ?? 0 }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""> المبلغ الذى تم دفعه</label>
                                <span class="d-block">{{ $invoice->InvoiceDetails->last()->Amount_Paid ?? 0 }}</span>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    @push('scripts')
        <script type="text/javascript">
            function printDiv() {
                var printContents = document.getElementById('print').innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
                location.reload();
            }
        </script>
    @endpush

</x-dashBoard.dash-board-home>
