@props(['mode' => ''])

<input type="text" x-data x-init="flatpickr($el, { {{ $mode }} })"
    {{ $attributes }} />
