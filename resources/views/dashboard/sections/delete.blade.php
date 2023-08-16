    <div class="modal fade " id="modal-sm3">
        <div class="modal-dialog modal-sm">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 id="delete_section_name_id" class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('admin.sections.delete') }}" method="POST">
                    @csrf
                    <x-form.input type="hidden" name="section_id" id="delete_section_id" />

                    <p class="text-center m-5">هل تريد حذ ف القسم </p>


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
