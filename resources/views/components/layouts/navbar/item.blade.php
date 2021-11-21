@props(['active' => false])

<a
    {{ $attributes->class(['inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium', 'border-indigo-500 text-gray-900' => $active, 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' => !$active]) }}>
    {{ $slot }}
</a>
