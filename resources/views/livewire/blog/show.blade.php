<div class="container w-full md:max-w-3xl mx-auto pt-20">

    <div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal">
        <div class="font-sans">
            <p class="text-base md:text-sm text-green-500 font-bold">&lt;
                <a href="{{ route('blog.index') }}"
                    class="text-base md:text-sm text-green-500 font-bold no-underline hover:underline">BACK TO BLOG</a>
            </p>
            <h1 class="font-bold break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">
                {{ $post->title }}
            </h1>
            <p class="text-sm md:text-base font-normal text-gray-600">Published {{ $post->published_at }}</p>
        </div>

        <div class="mt-3">
            <x-markdown :content="$post->content" />
        </div>
    </div>

    <div class="my-10 lg:flex items-center p-5 border border-lighter  rounded">
        <div class="w-full lg:w-1/6 flex lg:block place-content-center lg:text-left">
            <img src="{{ $post->author->avatar_url }}" class="rounded-full w-32 lg:w-full">
        </div>
        <div class="lg:pl-5 leading-loose text-center lg:text-left text-text-color w-full lg:w-5/6">
            By <span class="font-bold">{{ $post->author->name }}</span>
            <div class="text-sm">
                <p>{{ $post->author->email }}</p>
            </div>
        </div>
    </div>

    <div class="flex justify-between content-center px-4 pb-12">
        @if ($previousPost)
            <div class="text-left">
                <p>
                    <a href="{{ route('blog.show', $previousPost->slug) }}"
                        class="break-normal text-base md:text-sm text-green-500 font-bold no-underline hover:underline">
                        &lt; Previous
                    </a>
                </p>
                <span class="text-xs md:text-sm font-normal text-gray-600">{{ $previousPost->title }}</span><br>
            </div>
        @endif
        @if ($nextPost)
            <div class="text-right">
                <p>
                    <a href="{{ route('blog.show', $nextPost->slug) }}"
                        class="break-normal text-base md:text-sm text-green-500 font-bold no-underline hover:underline">
                        Next &gt;
                    </a>
                </p>
                <span class="text-xs md:text-sm font-normal text-gray-600">{{ $nextPost->title }}</span><br>
            </div>
        @endif

    </div>
</div>
