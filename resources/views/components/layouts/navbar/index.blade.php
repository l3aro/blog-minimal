<nav id="header" class="bg-white shadow fixed w-full z-10 top-0">
    <div id="progress" class="h-1 z-20 top-0"
        style="background:linear-gradient(to right, #4dc0b5 var(--scroll), transparent 0);"></div>
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button -->
                <button type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>

                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>

                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <a class="text-gray-900 no-underline hover:no-underline font-extrabold text-xl" href="/">
                        Minimal Blog
                    </a>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <!-- Current: "border-indigo-500 text-gray-900", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                    <x-layouts.navbar.item :href="route('me.posts.index')" :active="request()->routeIs('me.posts.*')">
                        Your Posts
                    </x-layouts.navbar.item>
                    @can('access-admin-function')
                        <x-layouts.navbar.item :href="route('posts.index')" :active="request()->routeIs('posts.*')">
                            Manage Posts
                        </x-layouts.navbar.item>
                        <x-layouts.navbar.item :href="route('users.index')" :active="request()->routeIs('users.*')">
                            Manage Users
                        </x-layouts.navbar.item>
                    @endcan
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                @guest
                    <a href="{{ route('login') }}"
                        class="text-gray-500 hover:text-gray-900 focus:outline-none focus:underline">
                        Login
                    </a>
                @endguest

                @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium">
                                <img src="{{ auth()->user()->avatar_url }}" class="w-10 h-10 rounded-full"
                                    title="Baro">
                            </button>
                        </x-slot>

                        <x-dropdown-link :href="route('me.index')" >
                            Your Profile
                        </x-dropdown-link>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <x-dropdown-link onclick="event.preventDefault();this.closest('form').submit();">
                                Logout
                            </x-dropdown-link>
                        </form>
                    </x-dropdown>
                @endauth

            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden bg-white shadow" id="mobile-menu">
        <div class="pt-2 pb-4 space-y-1">
            <!-- Current: "bg-indigo-50 border-indigo-500 text-indigo-700", Default: "border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700" -->
            <a href="#"
                class="bg-indigo-50 border-indigo-500 text-indigo-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Dashboard</a>
            <a href="#"
                class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Team</a>
            <a href="#"
                class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Projects</a>
            <a href="#"
                class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Calendar</a>
        </div>
    </div>
</nav>
