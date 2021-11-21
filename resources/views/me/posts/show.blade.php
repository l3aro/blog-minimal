<x-app-layout>
    <div class="flex justify-end mb-3">
        <button type="button"
            class="transition inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-xs font-medium text-gray-700 hover:text-white bg-white hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-purple-500">
            <!-- Heroicon name: outline/trash -->
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                    clip-rule="evenodd" />
            </svg>
        </button>
        <button type="button"
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
                    1
                </p>
            </div>
        </div>
        <div class="flex border-b border-40 -mx-6 px-6">
            <div class="w-1/4 py-4">
                <h4 class="font-normal text-80">Title</h4>
            </div>
            <div class="w-3/4 py-4 break-words">
                <p class="text-90">
                    The blog title
                </p>
            </div>
        </div>
        <div class="flex border-b border-40 -mx-6 px-6">
            <div class="w-1/4 py-4">
                <h4 class="font-normal text-80">Status</h4>
            </div>
            <div class="w-3/4 py-4 break-words">
                <p class="text-90">
                    Draft
                </p>
            </div>
        </div>
        <div class="flex border-b border-40 -mx-6 px-6">
            <div class="w-1/4 py-4">
                <h4 class="font-normal text-80">Cover Image</h4>
            </div>
            <div class="w-3/4 py-4 break-words">
                <div class="block h-post-card-image bg-cover bg-center bg-no-repeat w-full h-48 mb-5"
                    style="background-image: url('http://127.0.0.1:8000/assets/images/blog-cover.webp')">
                </div>
            </div>
        </div>
        <div class="flex border-40 -mx-6 px-6">
            <div class="w-1/4 py-4">
                <h4 class="font-normal text-80">Content</h4>
            </div>
            <div class="w-3/4 py-4 break-words">
                <p class="text-90">
                    0
                </p>
            </div>
        </div>
        <!---->
    </div>
</x-app-layout>
