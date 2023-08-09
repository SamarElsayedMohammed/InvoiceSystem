@props([
    'id' => '',
    'labelName' => '',
])

<label for="{{ $id }}">{{ $slot }}</label>
