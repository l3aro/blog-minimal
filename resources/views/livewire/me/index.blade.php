<div>
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
