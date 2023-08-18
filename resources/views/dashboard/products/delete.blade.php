    <div class="modal fade " id="modal-sm3">
        <div class="modal-dialog modal-sm">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 id="delete_section_name_id" class="modal-title">حذف المنتج</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('admin.products.delete') }}" method="POST">
                    @csrf
                    <x-form.input type="hidden" name="product_id" id="delete_product_id" />

                    <p class="text-center m-5">هل تريد حذ ف المنتج </p>


                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                        <button style="color:black;" type="submit" class="btn btn-primary">حذف</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
