<x-dashBoard.dash-board-home>
    <x-slot:breadcrumbs>
        <x-dash-board.includes.breadcrumbs pageTilte="الفواتير">
            <li class="breadcrumb-item active"> فاصيل الفاتوره</li>

        </x-dash-board.includes.breadcrumbs>
    </x-slot:breadcrumbs>
    <div class="col-12">
        <x-dash-board.session-message-component type='success' />
        <x-dash-board.session-message-component type='danger' />

        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="invoice-tab" data-bs-toggle="tab" data-bs-target="#invoice"
                            type="button" role="tab" aria-controls="invoice" aria-selected="true">invoice</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                            type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                        @include('dashboard.invoices.__form')
                        <div class="row">
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
                        </div>

                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        @include('dashboard.invoice_details.invoice_details')
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                        @include('dashboard.invoice_details.invoice_files')


                    </div>
                </div>

            </div>
            <!-- /.card-body -->
        </div>
    </div>


</x-dashBoard.dash-board-home>
