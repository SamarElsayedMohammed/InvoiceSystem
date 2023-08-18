    <div class="modal fade  " id="modal-sm2">
        <div class="modal-dialog modal-sm">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">تعديل المنتج</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('admin.products.update') }}" method="POST">
                    @csrf
                    <x-form.input type="hidden" name="product_id" id="product_id" />
                    @include('dashboard.products.__form')

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                        <button style="color:black;" type="submit" class="btn btn-primary">تحديث</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
