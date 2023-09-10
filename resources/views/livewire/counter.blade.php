<div class="col-md-4">

    <x-dashboard.sections />

</div>
<div class="col-md-4">
    <div style="text-align: center">
        {{-- <button >+</button> --}}
        <div class="form-group">
            {{ $count }}
            {{-- <label for="exampleSelectRounded0">المنتجات</label>
            <select name="product_name" class='custom-select rounded-0 @error('Rate_VAT')  is-invalid @enderror'
                id="exampleSelectRounded0">
                @foreach ($count as $item)
                    <option value="{{ $item['product_name'] }}">{{ $item['product_name'] }}</option>
                @endforeach

            </select>
            <x-form.validation name="product_name" /> --}}
        </div>

    </div>
</div>
