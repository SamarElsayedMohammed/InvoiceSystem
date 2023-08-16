    <div class="modal fade  " id="modal-sm2">
        <div class="modal-dialog modal-sm">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">تعديل القسم</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('admin.sections.update') }}" method="POST">
                    @csrf
                    <x-form.input type="hidden" name="section_id" id="section_id" />
                    @include('dashboard.sections.__form')

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button style="color:black;" type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
