<button wire:click="getProducts">+</button>
<div class="form-group">
    <label for="exampleSelectRounded0">المنتجات</label>
    {{ $products }}
    {{-- <select name="product_name" class='custom-select rounded-0 @error('Rate_VAT')  is-invalid @enderror'
        id="exampleSelectRounded0">
        @foreach ($products as $item)
            <option value="{{ $item['product_name'] }}">{{ $item['product_name'] }}</option>
        @endforeach

    </select> --}}
    <x-form.validation name="Rate_VAT" />
</div>
