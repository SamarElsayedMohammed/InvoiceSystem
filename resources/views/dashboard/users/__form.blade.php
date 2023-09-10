<div class="modal-body">

    <div class="form-group">
        <x-form.input type="text" name="name" label="true" id="name_id" labelName="اسم المستخدم"
            value="{{ $user->name }}" />

    </div>
    <div class="form-group">
        <x-form.input type="email" name="email" label="true" id="email_id" labelName="البريد الالكترونى"
            value="{{ $user->email }}" />

    </div>
    <div class="form-group">
        <x-form.input type="text" name="password" label="true" id="password_id" labelName="كلمه السر" />

    </div>
    <div class="form-group">
        <x-form.input type="text" name="confirm-password" label="true" id="confirm-password_id"
            labelName="تاكيد كلمه السر" />

    </div>
</div>
