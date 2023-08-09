@props([
    'name',
    'value' => '',
    'label' => false,
    'id' => '',
    'labelName' => '',
])

@if ($label)
    <x-form.label for="{{ $id }}">{{ $labelName }}</x-form.label>
@endif

<textarea id="{{ $id }}"  name="{{ $name }}"
    {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }} >
{{ old($name, $value) }}
</textarea>

<x-form.validation :name="$name" />
