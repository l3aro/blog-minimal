<div class="bg-white rounded shadow px-8 py-6">
    <form class="space-y-8 divide-y divide-gray-200">
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div>
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Edit
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Update user profile.
                    </p>
                </div>

                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Name <span class="text-red-600">*</span>
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="text" wire:model.debounce.1s="user.name"
                                class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                            <x-session-error field="user.name" />
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Email
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="text" value="{{ $user->email }}" readonly
                                class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md bg-gray-100">
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Avatar
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="flex items-center">
                                <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                    <img src="{{ $image?->temporaryUrl() ?? $user->avatar_url }}" alt="Avatar"
                                        class="h-full w-full object-cover">
                                </span>
                                <label
                                    class="cursor-pointer ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Change
                                    <input type="file" class="hidden" wire:model="image">
                                </label>
                            </div>
                            <x-session-error field="image" />
                        </div>
                    </div>

                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <div>
                        <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700"
                            id="label-notifications">
                            Role
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <div class="max-w-lg">
                            <p class="text-sm text-gray-500">Access level to the application.</p>
                            <div class="mt-4 space-y-4">
                                <div class="flex items-center">

                                    <label for="level-admin" class="ml-3 block text-sm font-medium text-gray-700">
                                        <input id="level-admin" name="user.is_admin" wire:model="user.is_admin"
                                            type="radio"
                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                            value="1">
                                        &nbsp;Admin
                                    </label>
                                </div>
                                <div class="flex items-center">

                                    <label for="level-user" class="ml-3 block text-sm font-medium text-gray-700">
                                        <input id="level-user" name="user.is_admin" wire:model="user.is_admin"
                                            type="radio"
                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                            value="0">
                                        &nbsp;Member
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Update Password
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Setup a new password or keep current one.
                    </p>
                </div>

                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Password
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="password" wire:model.defer="password"
                                class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                            <x-session-error field="password" />
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Password Confirmation
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="password" wire:model.defer="password_confirmation"
                                class="block max-w-lg w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <a href="{{ route('me.index') }}"
                    class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </a>
                <button type="submit" wire:click.prevent="saveAndContinue"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update & Continue Editing
                </button>
                <button type="submit" wire:click.prevent="saveAndView"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update & View
                </button>
            </div>
        </div>
    </form>
</div>
