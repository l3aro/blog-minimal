<div class="container w-full md:max-w-3xl mx-auto pt-20">
    <div class="flex-1 px-2 flex justify-center lg:ml-6 mt-5">
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
                <input id="search" wire:model.debounce.500ms="filter.search"
                    class="block w-full bg-white py-2 pl-10 pr-3 border border-gray-300 rounded-md leading-5 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500 focus:placeholder-gray-500 sm:text-sm"
                    placeholder="Search by title or description..." type="search" name="search">
            </div>
        </div>
    </div>


    <div class="w-full my-10">
        @forelse ($posts as $post)
            <a class="no-underline block border border-lighter w-full mb-10 p-5 rounded shadow-md hover:shadow-2xl
            transition duration-200 ease-in-out transform hover:-translate-y-1"
                href="{{ route('blog.show', $post->slug) }}">
                <div class="block h-post-card-image bg-cover bg-center bg-no-repeat w-full h-48 mb-5"
                    style="background-image: url('{{ $post->image_url }}')">
                </div>
                <div class="flex flex-col justify-between flex-1">
                    <div>
                        <h2 class="leading-normal block mb-6 text-xl font-bold">
                            {{ $post->title }}
                        </h2>

                        <p class="mb-6 leading-loose">
                            {{ Str::limit($post->description, 200) }}
                        </p>
                    </div>

                    <div class="flex items-center text-sm text-light">
                        <img src="{{ $post->author->avatar_url }}" class="w-10 h-10 rounded-full" title="Baro">
                        <span class="ml-2">{{ $post->author->name }}</span>
                        <span class="ml-auto">{{ $post->published_at }}</span>
                    </div>
                </div>
            </a>
        @empty
            <div class="text-center">
                <h1 class="text-3xl font-bold">No Posts Yet</h1>
            </div>
        @endforelse

        <hr class="border-b-2 border-gray-400 mb-8 mx-4">

        <div class="flex justify-between content-center px-4 pb-12">
            <div class="text-left">
                <p>
                    <a href="#" wire:click.prevent="previousPage"
                        class="break-normal text-base md:text-sm text-green-500 font-bold no-underline hover:underline">
                        &lt; Previous
                    </a>
                </p>
            </div>
            <div class="text-right">
                <p>
                    <a href="#" wire:click.prevent="nextPage"
                        class="break-normal text-base md:text-sm text-green-500 font-bold no-underline hover:underline">
                        Next &gt;
                    </a>
                </p>
            </div>
        </div>
    </div>

</div>
