<div class="col-12">
    {{-- @dd($invoice) --}}
    <div class="form-group">
        <div class="row">
            <div class="col-6">
                <div class="col-12">

                    <label for="exampleSelectRounded0">اختر القسم</label>
                    {{-- /*wire:change="getProducts($event.target.value)"*/ --}}

                    <select wire:model="sectionId"name="section_id"
                        class='custom-select rounded-0 @error('section_id')  is-invalid @enderror'
                        id="exampleSelectRounded0">
                        <option>choose one</option>

                        @foreach ($sections as $item)
                            <option value="{{ $item->id }}" @selected($item->id == $invoice->section_id)>
                                {{ $item->section_name }}
                            </option>
                        @endforeach

                    </select>
                    <div>
                        selected :
                        <span class="text-success bold">{{ $invoice->section->section_name ?? null }}</span>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="col-12">
                    <label for="exampleSelectRounded0">اختر المنتج</label>

                    <select name="product_id" class='custom-select rounded-0 @error('product_id')  is-invalid @enderror'
                        id="exampleSelectRounded3">
                        <option value="">choose one</option>
                        @foreach ($products as $item)
                            <option value="{{ $item->id }}" @selected($item->id == $invoice->product_id)>{{ $item->product_name }}
                            </option>
                        @endforeach

                    </select>
                    <div>
                        selected :
                        <span class="text-success bold">{{ $invoice->product->product_name ?? null }}</span>
                    </div>
                </div>
            </div>
        </div>
        <x-form.validation name="section_id" />
    </div>
</div>
