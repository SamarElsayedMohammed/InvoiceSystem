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
                        <h3 class="card-title">انشاء فاتوره جديده</h3>

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
                        <form method="POST" action="{{ route('admin.invoices.store') }}" enctype="multipart/form-data">
                            @csrf

                            @include('dashboard.invoices.__form')

                            <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                            <h5 class="card-title">المرفقات</h5>
                            <div class="col-sm-12 col-md-12">
                                <input type="file" name="pic" class="dropify"
                                    accept=".pdf,.jpg, .png, image/jpeg, image/png" data-height="70" />
                            </div><br>

                            <button class="btn btn-success" type="submit">حفظ</button>
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
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
        <script>
            var uploadedDocumentMap = {}
            Dropzone.options.dpzMultipleFiles = {
                paramName: "dzfile", // The name that will be used to transfer the file
                maxFiles: 10,
                maxFilesize: 5, // MB
                clickable: true,
                addRemoveLinks: true,
                acceptedFiles: 'image/*',
                dictFallbackMessage: " المتصفح الخاص بكم لا يدعم خاصيه تعدد الصوره والسحب والافلات ",
                dictInvalidFileType: "لايمكنك رفع هذا النوع من الملفات ",
                dictCancelUpload: "الغاء الرفع ",
                dictCancelUploadConfirmation: " هل انت متاكد من الغاء رفع الملفات ؟ ",
                dictRemoveFile: "حذف الصوره",
                dictMaxFilesExceeded: "لايمكنك رفع عدد اكثر من هضا ",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }

                ,
                url: "", // Set the url
                success: function(file, response) {
                    $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                    uploadedDocumentMap[file.name] = response.name
                },
                removedfile: function(file) {
                    file.previewElement.remove()
                    var name = ''
                    if (typeof file.file_name !== 'undefined') {
                        name = file.file_name
                    } else {
                        name = uploadedDocumentMap[file.name]
                    }
                    console.log(name);
                    $.ajax({
                        type: 'GET',
                        url: '',
                        // data: '_token = <?php echo csrf_token(); ?>',
                        success: function(data) {
                            // Handle the response from the server
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            // Handle the error
                        }
                    });

                    $('form').find('input[name="document[]"][value="' + name + '"]').remove()

                },
                // previewsContainer: "#dpz-btn-select-files", // Define the container to display the previews
                init: function() {

                    @if (isset($event) && $event->document)
                        var files =
                            {!! json_encode($event->document) !!}
                        for (var i in files) {
                            var file = files[i]
                            this.options.addedfile.call(this, file)
                            file.previewElement.classList.add('dz-complete')
                            $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                        }
                    @endif
                }
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script>
            $(document).ready(function() {
                $('body').on('click', 'a.deleteImageAjax', function(e) {
                    e.preventDefault();
                    $.ajax({
                        type: 'post',
                        url: "",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            // 'imageId': $(this).attr('data-id'),
                            'imageProduct': $(this).attr('data-product'),
                        },
                        success: function(data) {
                            $("#image").remove();
                            $("#products-images").load(
                                "");
                            // location.reload();


                        }
                    });
                });
            });
        </script> --}}
       
        {{-- <script>
            function myFunction() {

                alert("wlcome");

                // var Amount_Commission = parseFloat(document.getElementById("Amount_Commission").value);
                // var Discount = parseFloat(document.getElementById("Discount").value);
                // var Rate_VAT = parseFloat(document.getElementById("Rate_VAT").value);
                // var Value_VAT = parseFloat(document.getElementById("Value_VAT").value);

                // var Amount_Commission2 = Amount_Commission - Discount;


                // if (typeof Amount_Commission === 'undefined' || !Amount_Commission) {

                //     alert('يرجي ادخال مبلغ العمولة ');

                // } else {
                //     var intResults = Amount_Commission2 * Rate_VAT / 100;

                //     var intResults2 = parseFloat(intResults + Amount_Commission2);

                //     sumq = parseFloat(intResults).toFixed(2);

                //     sumt = parseFloat(intResults2).toFixed(2);

                //     document.getElementById("Value_VAT").value = sumq;

                //     document.getElementById("Total").value = sumt;

            }

            }
        </script> --}}
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- bs-custom-file-input -->
        <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
        <script>
            document.getElementById('invoice_Date_id').valueAsDate = new Date();
        </script>
    @endpush

</x-dashBoard.dash-board-home>
