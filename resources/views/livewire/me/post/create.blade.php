<div class="bg-white rounded shadow px-8 py-6">
    <form class="space-y-8 divide-y divide-gray-200">
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div>
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Create
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Write new blog post.
                    </p>
                </div>

                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Title <span class="text-red-600">*</span>
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="text" wire:model.debounce.1s="post.title"
                                class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                            <x-session-error field="post.title" />
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Slug <span class="text-red-600">*</span>
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="text" wire:model.defer="post.slug"
                                class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                            <x-session-error field="post.slug" />
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Description <span class="text-red-600">*</span>
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="text" wire:model.defer="post.description"
                                class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                            <x-session-error field="post.description" />
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Cover photo <span class="text-red-600">*</span>
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            @if ($image)
                                <div class="block bg-cover bg-center bg-no-repeat max-w-lg h-48 mb-5"
                                    style="background-image: url('{{ $image->temporaryUrl() }}')">
                                </div>
                            @endif
                            <label
                                class="cursor-pointer max-w-lg flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                        viewBox="0 0 48 48" aria-hidden="true">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                    <span class="text-sm">Upload a file</span>
                                    <input wire:model="image" type="file" class="sr-only">
                                    <p class="text-xs text-gray-500">
                                        PNG, JPG, GIF up to 10MB
                                    </p>
                                </div>
                            </label>
                            <x-session-error field="image" />
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Content <span class="text-red-600">*</span>
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div id="editor" rows="3" wire:ignore
                                class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"
                                x-data="{content: @entangle('post.content')}" x-init="
                                    editor = new Editor({
                                        el: $el,
                                        height: '400px',
                                        initialEditType: 'markdown',
                                        placeholder: 'Write something cool!',
                                    })
                                    editor.on('change', (e) => {
                                        content = editor.getMarkdown()
                                    })
                                "></div>
                            <x-session-error field="post.content" />
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <a href="{{ route('me.posts.index') }}"
                    class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </a>
                <x-button type="submit" wire:click.prevent="saveAndAdd" class="ml-3">
                    Create & Add Another
                </x-button>
                <x-button type="submit" wire:click.prevent="saveAndView" class="ml-3">
                    Create & View
                </x-button>
            </div>
        </div>
    </form>
</div>
