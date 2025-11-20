@props(['active'])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center px-3 py-2 rounded-md bg-blue-800 text-white font-semibold'
    : 'inline-flex items-center px-3 py-2 text-gray-200 hover:bg-blue-800 hover:text-white rounded-md transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
