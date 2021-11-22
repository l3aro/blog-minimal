<div class="container w-full md:max-w-3xl mx-auto pt-20">

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
                        <img src="{{ $post->author->avatar_url }}" class="w-10 h-10 rounded-full"
                            title="Baro">
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
