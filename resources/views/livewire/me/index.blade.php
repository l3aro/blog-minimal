<div>
    <div class="flex justify-end mb-3">
        <a href="{{ route('me.edit') }}"
            class="ml-2 transition inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-xs font-medium text-gray-700 hover:text-white bg-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-purple-500">
            <!-- Heroicon name: outline/pencil-alt -->
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true">
                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                <path fill-rule="evenodd"
                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                    clip-rule="evenodd" />
            </svg>
        </a>
    </div>
    <div class="bg-white shadow rounded mb-6 py-3 px-6">
        <div class="flex border-b border-40 -mx-6 px-6">
            <div class="w-1/4 py-4">
                <h4 class="font-normal text-80">Name</h4>
            </div>
            <div class="w-3/4 py-4 break-words">
                <p class="text-90">
                    {{ $user->name }}
                </p>
            </div>
        </div>
        <div class="flex border-b border-40 -mx-6 px-6">
            <div class="w-1/4 py-4">
                <h4 class="font-normal text-80">Email</h4>
            </div>
            <div class="w-3/4 py-4 break-words">
                <p class="text-90">
                    {{ $user->email }}
                </p>
            </div>
        </div>
        <div class="flex border-b border-40 -mx-6 px-6">
            <div class="w-1/4 py-4">
                <h4 class="font-normal text-80">Avatar</h4>
            </div>
            <div class="w-3/4 py-4 break-words">
                <img class="inline-block h-14 w-14 rounded-full"
                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                    alt="">

            </div>
        </div>
        <div class="flex border-b border-40 -mx-6 px-6">
            <div class="w-1/4 py-4">
                <h4 class="font-normal text-80">Total Post</h4>
            </div>
            <div class="w-3/4 py-4 break-words">
                <a class="text-90 font-bold text-blue-500" href="{{ route('me.posts.index') }}">
                    {{ $post_count }}
                </a>
            </div>
        </div>
        <div class="flex border-b border-40 -mx-6 px-6">
            <div class="w-1/4 py-4">
                <h4 class="font-normal text-80">Draft Post</h4>
            </div>
            <div class="w-3/4 py-4 break-words">
                <a class="text-90 font-bold text-blue-500"
                    href="{{ route('me.posts.index', ['filter' => ['status' => 'draft']]) }}">
                    {{ $post_draft_count }}
                </a>
            </div>
        </div>
        <div class="flex border-b border-40 -mx-6 px-6">
            <div class="w-1/4 py-4">
                <h4 class="font-normal text-80">Published Post</h4>
            </div>
            <div class="w-3/4 py-4 break-words">
                <a class="text-90 font-bold text-blue-500"
                    href="{{ route('me.posts.index', ['filter' => ['status' => 'published']]) }}">
                    {{ $post_published_count }}
                </a>
            </div>
        </div>
    </div>
</div>
