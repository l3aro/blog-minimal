<div>
    <div class="flex justify-end mb-3">
        <button
            class="ml-2 transition inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-xs font-medium text-gray-700 hover:text-white bg-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-purple-500">
            <!-- Heroicon name: outline/pencil-alt -->
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true">
                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                <path fill-rule="evenodd"
                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    <div class="bg-white shadow rounded mb-6 py-3 px-6">
        <div class="flex border-b border-40 -mx-6 px-6">
            <div class="w-1/4 py-4">
                <h4 class="font-normal text-80">ID</h4>
            </div>
            <div class="w-3/4 py-4 break-words">
                <p class="text-90">
                    {{ $post->id }}
                </p>
            </div>
        </div>
        <div class="flex border-b border-40 -mx-6 px-6">
            <div class="w-1/4 py-4">
                <h4 class="font-normal text-80">Title</h4>
            </div>
            <div class="w-3/4 py-4 break-words">
                <p class="text-90">
                    {{ $post->title }}
                </p>
            </div>
        </div>
        <div class="flex border-b border-40 -mx-6 px-6">
            <div class="w-1/4 py-4">
                <h4 class="font-normal text-80">Slug</h4>
            </div>
            <div class="w-3/4 py-4 break-words">
                <p class="text-90">
                    {{ $post->slug }}
                </p>
            </div>
        </div>
        <div class="flex border-b border-40 -mx-6 px-6">
            <div class="w-1/4 py-4">
                <h4 class="font-normal text-80">Description</h4>
            </div>
            <div class="w-3/4 py-4 break-words">
                <p class="text-90">
                    {{ $post->description }}
                </p>
            </div>
        </div>
        <div class="flex border-b border-40 -mx-6 px-6">
            <div class="w-1/4 py-4">
                <h4 class="font-normal text-80">Status</h4>
            </div>
            <div class="w-3/4 py-4 break-words">
                <p class="text-90">
                    {{ $post->status }}
                </p>
            </div>
        </div>
        <div class="flex border-b border-40 -mx-6 px-6">
            <div class="w-1/4 py-4">
                <h4 class="font-normal text-80">Cover Image</h4>
            </div>
            <div class="w-3/4 py-4 break-words">
                <div class="block h-post-card-image bg-cover bg-center bg-no-repeat w-full h-48 mb-5"
                    style="background-image: url('{{ $post->image }}')">
                </div>
            </div>
        </div>
        <div class="flex border-40 -mx-6 px-6">
            <div class="w-1/4 py-4">
                <h4 class="font-normal text-80">Content</h4>
            </div>
            <div class="w-3/4 py-4 break-words">
                <p class="text-90">
                    <x-markdown :content="$post->content" />
                </p>
            </div>
        </div>
    </div>
</div>
