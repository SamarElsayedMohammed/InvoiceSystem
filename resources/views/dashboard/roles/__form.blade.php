<div class="modal-body">
    <div class="form-group">
        <x-form.input type="text" name="name" label="true" id="name_id" labelName="اسم المستخدم"
            value="{{ $role->name }}" />

    </div>

    <div class="form-group">
        <label class="form-check-label">
            قائمه الصلاحيات
            <hr>
            <div class="row">
                @foreach ($permissions as $item)
                    <div class="col-6 pb-2">
                        <input class="form-check-input" name="permissions[]" type="checkbox" value="{{ $item->id }}"
                            id="flexCheckChecked-{{ $item->id }}" @checked(in_array($item->id ,$rolePermissions))>
                        <label class="form-check-label" for="flexCheckChecked-{{ $item->id }}">
                            {{ $item->name }}
                    </div>
                    {{-- <br> --}}
                @endforeach
            </div>
    </div>
</div>
