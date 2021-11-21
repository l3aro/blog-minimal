<x-confirmation-modal wire:model="confirmingDeletion">
    <x-slot name="title">
        Delete Post
    </x-slot>

    <x-slot name="content">
        Are you sure you want to delete this post?
    </x-slot>

    <x-slot name="footer">
        <button type="button" wire:click="$toggle('confirmingDeletion')" wire:loading.attr="disabled"
            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
            Cancel
        </button>
        <button type="button" wire:click="deletePost" wire:loading.attr="disabled"
            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
            Delete
        </button>
    </x-slot>
</x-confirmation-modal>
