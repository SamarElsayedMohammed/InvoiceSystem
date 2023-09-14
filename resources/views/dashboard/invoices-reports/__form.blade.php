<div class="row">

    {{-- {{ old($name, $value) }} --}}
    <div class="col-md-4">

        <div class="form-group">
            <x-form.input class="rounded" type="text" name="invoice_number" label="true" id="invoice_number_id"
                labelName="رقم الفاتوره" value="{{ $invoice->invoice_number }}" />
        </div>
    </div>
    <div class="col-md-4">

        <div class="form-group">
            <x-form.input class="rounded" type="date" name="invoice_Date" label="true" id="invoice_Date_id"
                labelName="تاريخ الفاتوره" value="{{ $invoice->invoice_Date }}" />
        </div>

    </div>


    <div class="col-md-4">

        <div class="form-group">
            <x-form.input class="rounded" type="date" name="Due_date" label="true" id="Due_date_id"
                labelName="تاريخ الاستحقاق" value="{{ $invoice->Due_date }}" />
        </div>

    </div>
    <livewire:get-products :invoice="$invoice" />
    <div class="col-md-4">

        <div class="form-group">
            <x-form.input class="rounded" type="number" step="0.01" name="Amount_collection" label="true"
                id="Amount_collection_id" labelName="مبلغ التحصيل" value="{{ $invoice->Amount_collection }}" />
        </div>
    </div>
    <div class="col-md-4">


        <div class="form-group">
            <x-form.input class="rounded" type="number" step="0.01" name="Amount_Commission" label="true"
                id="Amount_Commission_id" labelName="مبلغ العموله" value="{{ $invoice->Amount_Commission }}" />
        </div>
    </div>
    <div class="col-md-4">

        <div class="form-group">
            <x-form.input class="rounded" type="number" step="0.01" name="Discount" label="true" id="Discount_id"
                labelName="الخصم" value="{{ $invoice->Discount }}" />
        </div>
    </div>
    <!-- There could be any element that supports onchange event instead of input -->

    <div class="col-md-4">

        <div class="form-group">
            <label for="exampleSelectRounded0">نسبه ضريبه القيمه المضافه</label>
            <select name="Rate_VAT" class='custom-select rounded-0 @error('Rate_VAT')  is-invalid @enderror'
                id="Rate_VAT_id">
                <option value="5">5%</option>
                <option value="10">10%</option>

            </select>
            <x-form.validation name="Rate_VAT" />
        </div>
    </div>
    <div class="col-md-4">

        <div class="form-group">
            <x-form.input class="rounded" type="text" name="Value_VAT" label="true" id="Value_VAT_id"
                labelName="قيمه ضريبه القيمه المضافه" value="{{ $invoice->Value_VAT }}" readonly />
        </div>
    </div>
    <div class="col-md-4">

        <div class="form-group">
            <x-form.input class="rounded" type="text" name="Total" label="true" id="Total_id"
                labelName="الاجمالى شامل الضريبه " value="{{ $invoice->Total }}" readonly />
        </div>
    </div>
    <div class="col-md-12">

        <div class="form-group">

            <x-form.textarea name="note" label="true" id="note_id" labelName=" الوصف"
                value="{{ $invoice->note }}" />
        </div>
    </div>
</div>

@push('scripts')
    <script>
        //Somehow select the element
        var myElement = document.getElementById('Rate_VAT_id');

        //Attach the event listener to the element
        myElement.addEventListener('change', (event) => {
            // alert("sakljskljs");
            var Amount_Commission = parseFloat(document.getElementById("Amount_Commission_id").value);
            var Discount = parseFloat(document.getElementById("Discount_id").value);
            var Rate_VAT = parseFloat(document.getElementById("Rate_VAT_id").value);
            var Value_VAT = parseFloat(document.getElementById("Value_VAT_id").value);
            // console.log(Discount);

            var Amount_Commission2 = Amount_Commission - Discount;


            if (typeof Amount_Commission === 'undefined' || !Amount_Commission) {

                alert('يرجي ادخال مبلغ العمولة ');

            } else {
                var intResults = Amount_Commission2 * Rate_VAT / 100;

                var intResults2 = parseFloat(intResults + Amount_Commission2);

                sumq = parseFloat(intResults).toFixed(2);

                sumt = parseFloat(intResults2).toFixed(2);

                document.getElementById("Value_VAT_id").value = sumq;

                document.getElementById("Total_id").value = sumt;

            }


        });
    </script>
@endpush
