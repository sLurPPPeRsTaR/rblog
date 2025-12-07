<nav class="bg-gray-800" x-data="{ mobileOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
                        <x-my-nav-link href="/" :current="request()->is('/')">
                            Home
                        </x-my-nav-link>
                        <x-my-nav-link
                            href="/posts"
                            :current="request()->is('posts')"
                        >
                            Blog
                        </x-my-nav-link>
                        <x-my-nav-link
                            href="/about"
                            :current="request()->is('about')"
                        >
                            About
                        </x-my-nav-link>
                        <x-my-nav-link
                            href="/contact"
                            :current="request()->is('contact')"
                        >
                            Contact
                        </x-my-nav-link>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <!-- Profile dropdown -->
                    <div
                        x-data="{ open: false }"
                        @keydown.escape.window="open = false"
                        class="relative ml-3"
                    >
                        @if(Auth::check())

                            <button
                                @click="open = !open"
                                type="button"
                                class="relative flex max-w-xs items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 cursor-pointer"
                                :aria-expanded="open.toString()"
                                aria-haspopup="true"
                            >
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt=""
                                    class="size-8 rounded-full outline -outline-offset-1 outline-white/10"
                                />
                                <div class="text-gray-300 text-sm font-medium ml-3">{{ Auth::user()->name }}</div>
                                <div class="ms-1 text-gray-300">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </button>
                        @else
                            <a href="/login" class="text-white text-sm font-medium">Login</a>
                            <span class="text-white text-sm">|</span>
                            <a href="/register" class="text-white text-sm font-medium">Register</a>
                        @endif

                        <!-- Dropdown menu, show/hide based on menu state. -->
                        <div
                            x-show="open"
                            x-transition:enter="transition ease-out duration-100 transform"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75 transform"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            @click.away="open = false"
                            class="origin-top-right absolute right-0 mt-2 w-48 rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
                        >
                            <a
                                href="/profile"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                            >
                                Your profile
                            </a>
                            <a
                                href="/dashboard"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                            >
                                Settings
                            </a>
                            <form method="POST" action="/logout">
                                @csrf
                                <button
                                    type="submit"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer"
                                >
                                    Log out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button
                    type="button"
                    command="--toggle"
                    commandfor="mobile-menu"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500"
                    @click="mobileOpen = !mobileOpen"
                    :aria-expanded="mobileOpen.toString()"
                    aria-controls="mobile-menu"
                >
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <svg
                        x-show="!mobileOpen"
                        x-cloak
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.5"
                        data-slot="icon"
                        aria-hidden="true"
                        class="size-6"
                    >
                        <path
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                    <svg
                        x-show="mobileOpen"
                        x-cloak
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.5"
                        data-slot="icon"
                        aria-hidden="true"
                        class="size-6"
                    >
                        <path
                            d="M6 18 18 6M6 6l12 12"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div
        id="mobile-menu"
        x-show="mobileOpen"
        x-cloak
        x-transition:enter="transition ease-out duration-100 transform"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75 transform"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="block md:hidden"
    >
        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
            <x-my-nav-link class="block" href="/" :current="request()->is('/')">
                Home
            </x-my-nav-link>
            <x-my-nav-link
                class="block"
                href="/posts"
                :current="request()->is('posts')"
            >
                Blog
            </x-my-nav-link>
            <x-my-nav-link
                class="block"
                href="/about"
                :current="request()->is('about')"
            >
                About
            </x-my-nav-link>
            <x-my-nav-link
                class="block"
                href="/contact"
                :current="request()->is('contact')"
            >
                Contact
            </x-my-nav-link>
        </div>
        <div class="border-t border-white/10 pt-4 pb-3">
            @if(Auth::check())
                <div class="flex items-center px-5">
                    <div class="shrink-0">
                        <img
                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="{{ Auth::user()->name }}"
                            class="size-10 rounded-full outline -outline-offset-1 outline-white/10"
                        />
                    </div>
                    <div class="ml-3">
                        <div class="text-base/5 font-medium text-white">
                            {{ Auth::user()->name }}
                        </div>
                    </div>
                </div>
                <div class="mt-3 space-y-1 px-2">
                    <a
                        href="/profile"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white"
                    >
                        Your profile
                    </a>
                    <a
                        href="/dashboard"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white"
                    >
                        Settings
                    </a>

                    <form method="POST" action="/logout">
                        @csrf
                        <button
                            type="submit"
                            class="block w-full text-left rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white"
                        >
                            Log out
                        </button>
                    </form>
                </div>
            @else
                <a href="/login" class="text-white text-sm font-medium block py-2 ml-3">Login</a>
                <a href="/register" class="text-white text-sm font-medium block py-2 ml-3">Register</a>
            @endif
        </div>
    </div>
</nav>
