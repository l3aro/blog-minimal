<div>
    <x-slot name="action">
        <div class="mt-5 flex xl:mt-0 xl:ml-4">
            <span class="hidden sm:block ml-3">
                <a href="{{ route('users.create') }}"
                    class="relative inline-flex items-center bg-gray-700 py-2 pl-3 pr-4 border border-transparent rounded-md shadow-sm text-white">
                    <!-- Heroicon name: solid/add -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z"
                            clip-rule="evenodd" />
                    </svg>
                    <p class="ml-2.5 text-sm font-medium">
                        Create
                    </p>
                </a>
            </span>
        </div>
    </x-slot>

    <div class="flex justify-between mb-3">
        <div class="max-w-lg w-full lg:max-w-xs">
            <label for="search" class="sr-only">Search</label>
            <div class="relative text-gray-400 focus-within:text-gray-500">
                <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                    <!-- Heroicon name: solid/search -->
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <input id="search" wire:model.debounce="filter.search" type="search"
                    class="block w-full bg-white py-2 pl-10 pr-3 border border-gray-300 rounded-md leading-5 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500 focus:placeholder-gray-500 sm:text-sm"
                    placeholder="ID, Name, Email" type="search" name="search">
            </div>
        </div>

        <x-dropdown width="72">
            <x-slot name="trigger">
                <button type="button"
                    class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-xs font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-purple-500">
                    <!-- Heroicon name: outline/filter -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                </button>
                </span>
            </x-slot>
            <div class="space-y-4 divide-y divide-gray-200 px-4">
                <div class="pt-2">
                    <b>Filter Options</b>
                </div>
                <div class="grid grid-cols-1 gap-y-4 gap-x-4 sm:grid-cols-6 py-4">
                    <div class="sm:col-span-6">
                        <label class="block text-sm font-medium text-gray-700">
                            Role
                        </label>
                        <div class="mt-1">
                            <select wire:model="filter.is_admin"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                <option value="">&nbsp;</option>
                                @foreach ($this->role->labels() as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="sm:col-span-6">
                        <label class="block text-sm font-medium text-gray-700">
                            Created From
                        </label>
                        <div class="mt-1">
                            <x-flatpickr type="text" wire:model="filter.created_at_from"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" />
                        </div>
                    </div>
                    <div class="sm:col-span-6">
                        <label class="block text-sm font-medium text-gray-700">
                            Created To
                        </label>
                        <div class="mt-1">
                            <x-flatpickr type="text" wire:model="filter.created_at_to"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" />
                        </div>
                    </div>
                    <div class="sm:col-span-6 text-right">
                        <button type="button" wire:click="resetFilter"
                            class="transition inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-xs font-medium text-gray-700 hover:text-white bg-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-purple-500">
                            Reset
                        </button>
                    </div>
                </div>
            </div>
        </x-dropdown>
    </div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <x-data-table>
                    <x-slot name="header">
                        <x-data-table.heading sortable wire:click="applySort('id')" :direction="$sort['id'] ?? null">
                            ID
                        </x-data-table.heading>
                        <x-data-table.heading sortable wire:click="applySort('name')"
                            :direction="$sort['name'] ?? null">
                            Name
                        </x-data-table.heading>
                        <x-data-table.heading sortable wire:click="applySort('is_admin')"
                            :direction="$sort['is_admin'] ?? null">
                            Role
                        </x-data-table.heading>
                        <x-data-table.heading sortable wire:click="applySort('created_at')"
                            :direction="$sort['created_at'] ?? null">
                            Created At
                        </x-data-table.heading>
                        <x-data-table.heading class="text-right">
                            #
                        </x-data-table.heading>
                    </x-slot>
                    @forelse ($users as $user)
                        <tr wire:key="{{ $user->id }}">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="{{ $user->avatar_url }}" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $user->name }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $user->email }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $this->role->label($user->is_admin) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->created_at ?? '__' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('users.show', $user->id) }}"
                                    class="transition inline-flex items-center px-3 py-2 border border-gray-300 rounded-md shadow-sm text-xs font-medium text-gray-700 hover:text-white bg-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-purple-500">
                                    <!-- Heroicon name: outline/eye -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center p-6">
                                <div class="text-gray-500">No users found.</div>
                            </td>
                        </tr>
                    @endforelse

                    <x-slot name="pagination">
                        {{ $users->onEachSide(1)->links() }}
                    </x-slot>
                </x-data-table>
            </div>
        </div>
    </div>
</div>
