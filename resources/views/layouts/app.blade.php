<x-layouts.base>
    <header class="bg-gray-100 py-8 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:flex xl:items-center xl:justify-end">
            {{ $action ?? '' }}
        </div>
    </header>

    <main class="pt-8 pb-16 max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ $slot }}
    </main>
</x-layouts.base>
