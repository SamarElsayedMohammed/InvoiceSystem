<div class="form-group">
    <label for="exampleSelectRounded0">اختر القسم</label>
    <select name="section_id" class='custom-select rounded-0 @error('section_id')  is-invalid
    @enderror'
        id="exampleSelectRounded0">
        @foreach ($sections as $item)
            <option value="{{ $item->id }}">{{ $item->section_name }}</option>
        @endforeach

    </select>
    <x-form.validation name="section_id" />
</div>
