<!-- Site header -->
<header class="fixed top-2 md:top-6 w-full z-30">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div
            class="relative flex items-center justify-between gap-3 h-14 rounded-2xl px-3 backdrop-blur-xs bg-white/90 shadow-lg shadow-black/[0.03] before:absolute before:inset-0 before:rounded-[inherit] before:border before:border-transparent before:[background:linear-gradient(var(--color-gray-100),var(--color-gray-200))_border-box] before:[mask:linear-gradient(white_0_0)_padding-box,_linear-gradient(white_0_0)] before:[mask-composite:exclude_!important] before:pointer-events-none">

            <!-- Site branding -->
            <div class="flex-1 flex items-center">
                <!-- Logo -->
                <a class="inline-flex" href="/" aria-label="iSend.ai">
                    <img src="/public/img/logo-kit/logo_brand_white_bg.svg" class="w-36" alt="">
                </a>
            </div>

            <!-- Desktop navigation -->
            <nav class="hidden md:flex md:grow">

                <!-- Desktop menu links -->
                <ul class="text-sm flex grow justify-center flex-wrap items-center gap-4 lg:gap-8">
                    <!-- Features Dropdown -->
                    <li class="relative px-3 py-1 group" x-data="{ open: false }">
                        <button class="text-gray-700 hover:text-gray-900 flex items-center transition"
                            @mouseenter="open = true" @mouseleave="open = false" @click="open = !open"
                            @click.outside="open = false" @keydown.escape.window="open = false">
                            Social
                            <svg class="w-3 h-3 ml-1 fill-current transition-transform duration-200"
                                :class="{ 'rotate-180': open }" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.29289 8.29289C4.68342 7.90237 5.31658 7.90237 5.70711 8.29289L12 14.5858L18.2929 8.29289C18.6834 7.90237 19.3166 7.90237 19.7071 8.29289C20.0976 8.68342 20.0976 9.31658 19.7071 9.70711L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071L4.29289 9.70711C3.90237 9.31658 3.90237 8.68342 4.29289 8.29289Z"
                                        fill="#000000"></path>
                                </g>
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute top-full left-0 mt-2 w-80 bg-white rounded-xl shadow-lg shadow-black/[0.03] before:absolute before:inset-0 before:rounded-[inherit] before:border before:border-transparent before:[background:linear-gradient(var(--color-gray-100),var(--color-gray-200))_border-box] before:[mask:linear-gradient(white_0_0)_padding-box,_linear-gradient(white_0_0)] before:[mask-composite:exclude_!important] before:pointer-events-none z-50"
                            @mouseenter="open = true" @mouseleave="open = false" x-cloak>
                            <div class="relative p-2">
                                <a href="/social/twitter"
                                    class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition group">
                                    <div class="w-8 h-8 rounded-lg bg-red-100 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L18.364 5.636M5.636 18.364l12.728-12.728">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-900 transition">X.com</div>
                                        <div class="text-sm text-gray-500">Plan, Generate and Schedule Tweets</div>
                                    </div>
                                </a>

                                <a href="/social/linkedin"
                                    class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition group">

                                    <div class="w-8 h-8 rounded-lg bg-purple-100 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-medium text-gray-900 transition">LinkedIn</div>
                                        <div class="text-sm text-gray-500">Plan, Generate and Schedule LinkedIn Posts</div>
                                    </div>

                                </a>
                            </div>
                        </div>
                    </li>

                    <!-- Developers Dropdown -->
                    <li class="relative px-3 py-1 group" x-data="{ open: false }">
                        <button class="text-gray-700 hover:text-gray-900 flex items-center transition"
                            @mouseenter="open = true" @mouseleave="open = false" @click="open = !open"
                            @click.outside="open = false" @keydown.escape.window="open = false">
                            Emails
                            <svg class="w-3 h-3 ml-1 fill-current transition-transform duration-200"
                                :class="{ 'rotate-180': open }" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.29289 8.29289C4.68342 7.90237 5.31658 7.90237 5.70711 8.29289L12 14.5858L18.2929 8.29289C18.6834 7.90237 19.3166 7.90237 19.7071 8.29289C20.0976 8.68342 20.0976 9.31658 19.7071 9.70711L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071L4.29289 9.70711C3.90237 9.31658 3.90237 8.68342 4.29289 8.29289Z"
                                        fill="#000000"></path>
                                </g>
                            </svg>
                        </button>


                        <!-- Dropdown menu -->
                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute top-full left-0 mt-2 w-80 bg-white rounded-xl shadow-lg shadow-black/[0.03] before:absolute before:inset-0 before:rounded-[inherit] before:border before:border-transparent before:[background:linear-gradient(var(--color-gray-100),var(--color-gray-200))_border-box] before:[mask:linear-gradient(white_0_0)_padding-box,_linear-gradient(white_0_0)] before:[mask-composite:exclude_!important] before:pointer-events-none z-50"
                            @mouseenter="open = true" @mouseleave="open = false" x-cloak>
                            <div class="relative p-2">
                                <a href="/features/unsubscribe"
                                    class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition group">
                                    <div class="w-8 h-8 rounded-lg bg-red-100 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L18.364 5.636M5.636 18.364l12.728-12.728">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-900 transition">Unsubscribe Management</div>
                                        <div class="text-sm text-gray-500">Compliant, scalable unsubscribe system</div>
                                    </div>
                                </a>

                                <a href="/features/email-campaigns"
                                    class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition group">

                                    <div class="w-8 h-8 rounded-lg bg-purple-100 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-medium text-gray-900 transition">Email Campaigns</div>
                                        <div class="text-sm text-gray-500">Create and manage email campaigns</div>
                                    </div>

                                </a>
                            </div>
                        </div>

                    </li>

                    <li class="px-3 py-1">
                        <a class="text-gray-700 hover:text-gray-900 flex items-center transition"
                            href="/pricing">Pricing</a>
                    </li>

                    <!-- Features Dropdown -->
                    <li class="relative px-3 py-1 group" x-data="{ open: false }">
                        <button class="text-gray-700 hover:text-gray-900 flex items-center transition"
                            @mouseenter="open = true" @mouseleave="open = false" @click="open = !open"
                            @click.outside="open = false" @keydown.escape.window="open = false">
                            Resources
                            <svg class="w-3 h-3 ml-1 fill-current transition-transform duration-200"
                                :class="{ 'rotate-180': open }" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.29289 8.29289C4.68342 7.90237 5.31658 7.90237 5.70711 8.29289L12 14.5858L18.2929 8.29289C18.6834 7.90237 19.3166 7.90237 19.7071 8.29289C20.0976 8.68342 20.0976 9.31658 19.7071 9.70711L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071L4.29289 9.70711C3.90237 9.31658 3.90237 8.68342 4.29289 8.29289Z"
                                        fill="#000000"></path>
                                </g>
                            </svg>
                        </button>

                        
                        <!-- Dropdown menu -->
                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute top-full left-0 mt-2 w-[45rem] bg-white rounded-xl shadow-lg shadow-black/[0.03] before:absolute before:inset-0 before:rounded-[inherit] before:border before:border-transparent before:[background:linear-gradient(var(--color-gray-100),var(--color-gray-200))_border-box] before:[mask:linear-gradient(white_0_0)_padding-box,_linear-gradient(white_0_0)] before:[mask-composite:exclude_!important] before:pointer-events-none z-50"
                            @mouseenter="open = true" @mouseleave="open = false" x-cloak>
                            <div class="relative p-5">
                                <!-- Three Column Layout -->
                                <div class="grid grid-cols-3 gap-8">

                                    <!-- RESOURCES Column -->
                                    <div>
                                        <div class="space-y-1">
                                            <h3
                                                class="text-xs font-semibold text-gray-500 uppercase tracking-wider mx-2 my-3">
                                                Resources</h3>
                                            <a href="https://docs.isend.ai"
                                                class="flex items-center gap-2 p-2 rounded-xl hover:bg-gray-50 transition-all duration-200 group">
                                                <div
                                                    class="w-9 h-9 rounded-full bg-blue-100 flex items-center justify-center shadow-sm">
                                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <span
                                                    class="text-sm font-semibold text-gray-900 group-hover:text-blue-600 transition-colors">API
                                                    Documentation</span>
                                            </a>

                                            <a href="https://discord.gg/isend"
                                                class="flex items-center gap-2 p-2 rounded-xl hover:bg-gray-50 transition-all duration-200 group">
                                                <div
                                                    class="w-9 h-9 rounded-full bg-purple-100 flex items-center justify-center shadow-sm">
                                                    <svg class="w-5 h-5 text-purple-600" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515a.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0a12.64 12.64 0 0 0-.617-1.25a.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057a19.9 19.9 0 0 0 5.993 3.03a.078.078 0 0 0 .084-.028a14.09 14.09 0 0 0 1.226-1.994a.076.076 0 0 0-.041-.106a13.107 13.107 0 0 1-1.872-.892a.077.077 0 0 1-.008-.128a10.2 10.2 0 0 0 .372-.292a.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127a12.299 12.299 0 0 1-1.873.892a.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028a19.839 19.839 0 0 0 6.002-3.03a.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.956-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.955-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.946 2.418-2.157 2.418z" />
                                                    </svg>
                                                </div>
                                                <span
                                                    class="text-sm font-semibold text-gray-900 group-hover:text-purple-600 transition-colors">Discord</span>
                                            </a>

                                            <a href="https://github.com/isend-ai"
                                                class="flex items-center gap-2 p-2 rounded-xl hover:bg-gray-50 transition-all duration-200 group">
                                                <div
                                                    class="w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center shadow-sm">
                                                    <svg class="w-5 h-5 text-gray-900" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                                                    </svg>
                                                </div>
                                                <span
                                                    class="text-sm font-semibold text-gray-900 group-hover:text-gray-700 transition-colors">GitHub</span>
                                            </a>

                                            <a href="/arena"
                                                class="flex items-center gap-2 p-2 rounded-xl hover:bg-gray-50 transition-all duration-200 group">
                                                <div
                                                    class="w-9 h-9 rounded-full bg-green-100 flex items-center justify-center shadow-sm">
                                                    <svg class="w-5 h-5 text-green-600" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <span
                                                    class="text-sm font-semibold text-gray-900 group-hover:text-green-600 transition-colors">Expressive
                                                    TTS Arena</span>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- LIBRARIES Column -->
                                    <div>
                                        <div class="space-y-1">
                                            <h3
                                                class="text-xs font-semibold text-gray-500 uppercase tracking-wider mx-2 my-3">
                                                Libraries</h3>
                                            <a href="https://github.com/isend-ai/typescript-sdk"
                                                class="flex items-center gap-2 p-2 rounded-xl hover:bg-gray-50 transition-all duration-200 group">
                                                <div
                                                    class="w-9 h-9 rounded-full bg-blue-600 flex items-center justify-center shadow-sm">
                                                    <span class="text-sm font-bold text-white">TS</span>
                                                </div>
                                                <span
                                                    class="text-sm font-semibold text-gray-900 group-hover:text-blue-600 transition-colors">TypeScript
                                                    SDK</span>
                                            </a>

                                            <a href="https://github.com/isend-ai/react-sdk"
                                                class="flex items-center gap-2 p-2 rounded-xl hover:bg-gray-50 transition-all duration-200 group">
                                                <div
                                                    class="w-9 h-9 rounded-full bg-blue-500 flex items-center justify-center shadow-sm">
                                                    <svg class="w-5 h-5 text-white" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M14.23 12.004a2.236 2.236 0 0 1-2.235 2.236 2.236 2.236 0 0 1-2.236-2.236 2.236 2.236 0 0 1 2.235-2.236 2.236 2.236 0 0 1 2.236 2.236zm2.648-10.69c-1.346 0-3.107.956-5.347 2.86-.5.4-1.01.8-1.52 1.2-.51-.4-1.02-.8-1.52-1.2C4.22 2.27 2.46 1.314 1.113 1.314c-.41 0-.75.34-.75.75v7.36c0 .41.34.75.75.75.41 0 .75-.34.75-.75V3.064c1.346 0 2.646.956 4.347 2.36.5.4 1.01.8 1.52 1.2.51-.4 1.02-.8 1.52-1.2 1.7-1.404 3-2.36 4.347-2.36v6.36c0 .41.34.75.75.75.41 0 .75-.34.75-.75V2.064c0-.41-.34-.75-.75-.75z" />
                                                    </svg>
                                                </div>
                                                <span
                                                    class="text-sm font-semibold text-gray-900 group-hover:text-blue-500 transition-colors">React
                                                    SDK</span>
                                            </a>

                                            <a href="https://github.com/isend-ai/python-sdk"
                                                class="flex items-center gap-2 p-2 rounded-xl hover:bg-gray-50 transition-all duration-200 group">
                                                <div
                                                    class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-500 to-yellow-500 flex items-center justify-center shadow-sm">
                                                    <svg class="w-5 h-5 text-white" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M12 0C5.372 0 0 5.372 0 12s5.372 12 12 12 12-5.372 12-12S18.628 0 12 0zm0 2c5.514 0 10 4.486 10 10s-4.486 10-10 10S2 17.514 2 12 6.486 2 12 2zm0 4c-3.314 0-6 2.686-6 6s2.686 6 6 6 6-2.686 6-6-2.686-6-6-6zm0 2c2.209 0 4 1.791 4 4s-1.791 4-4 4-4-1.791-4-4 1.791-4 4-4z" />
                                                    </svg>
                                                </div>
                                                <span
                                                    class="text-sm font-semibold text-gray-900 group-hover:text-blue-600 transition-colors">Python
                                                    SDK</span>
                                            </a>

                                            <a href="https://github.com/isend-ai/swift-sdk"
                                                class="flex items-center gap-2 p-2 rounded-xl hover:bg-gray-50 transition-all duration-200 group">
                                                <div
                                                    class="w-9 h-9 rounded-full bg-orange-500 flex items-center justify-center shadow-sm">
                                                    <svg class="w-5 h-5 text-white" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M12 0C5.372 0 0 5.372 0 12s5.372 12 12 12 12-5.372 12-12S18.628 0 12 0zm0 2c5.514 0 10 4.486 10 10s-4.486 10-10 10S2 17.514 2 12 6.486 2 12 2zm0 4c-3.314 0-6 2.686-6 6s2.686 6 6 6 6-2.686 6-6-2.686-6-6-6zm0 2c2.209 0 4 1.791 4 4s-1.791 4-4 4-4-1.791-4-4 1.791-4 4-4z" />
                                                    </svg>
                                                </div>
                                                <span
                                                    class="text-sm font-semibold text-gray-900 group-hover:text-orange-500 transition-colors">Swift
                                                    SDK</span>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

            </nav>

            <!-- Desktop sign in links -->
            <ul class="flex-1 flex justify-end items-center gap-3">
                <li>
                    <a class="w-full cursor-pointer btn btn-sm text-gray-200 bg-gray-800 hover:bg-gray-900 shadow-sm"
                        href="<?= $userData ? '/a/' . $userData->aCode . '/dashboard' : '/login' ?>">
                        <?= $userData ? 'Dashboard' : 'Login' ?>
                    </a>
                </li>
            </ul>

            <!-- Mobile menu -->
            <div class="flex md:hidden" x-data="{ expanded: false }">

                <!-- Hamburger button -->
                <button
                    class="group inline-flex w-8 h-8 text-gray-800 bg-white text-center items-center justify-center transition"
                    aria-controls="mobile-nav" :aria-expanded="expanded" @click.stop="expanded = !expanded">
                    <span class="sr-only">Menu</span>
                    <svg class="w-4 h-4 fill-current pointer-events-none" viewBox="0 0 16 16"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect
                            class="origin-center transition-all duration-300 ease-[cubic-bezier(.5,.85,.25,1.1)] -translate-y-[5px] translate-x-[7px] group-aria-expanded:rotate-[315deg] group-aria-expanded:translate-y-0 group-aria-expanded:translate-x-0"
                            y="7" width="9" height="2" rx="1"></rect>
                        <rect
                            class="origin-center group-aria-expanded:rotate-45 transition-all duration-300 ease-[cubic-bezier(.5,.85,.25,1.8)]"
                            y="7" width="16" height="2" rx="1"></rect>
                        <rect
                            class="origin-center transition-all duration-300 ease-[cubic-bezier(.5,.85,.25,1.1)] translate-y-[5px] group-aria-expanded:rotate-[135deg] group-aria-expanded:translate-y-0"
                            y="7" width="9" height="2" rx="1"></rect>
                    </svg>
                </button>

                <!-- Mobile navigation -->
                <nav id="mobile-nav"
                    class="absolute top-full z-20 left-0 w-full max-h-[90vh] overflow-y-auto bg-white rounded-xl shadow-lg shadow-black/[0.03] md:before:absolute md:before:inset-0 md:before:rounded-[inherit] md:before:border md:before:border-transparent md:before:[background:linear-gradient(var(--color-gray-100),var(--color-gray-200))_border-box] md:before:[mask:linear-gradient(white_0_0)_padding-box,_linear-gradient(white_0_0)] md:before:[mask-composite:exclude_!important] md:before:pointer-events-none"
                    @click.outside="expanded = false" @keydown.escape.window="expanded = false" x-show="expanded"
                    x-transition:enter="transition ease-out duration-200 transform"
                    x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-out duration-200" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" x-cloak>

                    <ul class="text-sm p-2">
                        <!-- Features Mobile Menu -->
                        <li x-data="{ featuresOpen: false }">
                            <button
                                class="flex items-center justify-between w-full text-gray-700 hover:bg-gray-100 rounded-lg py-1.5 px-2"
                                @click="featuresOpen = !featuresOpen">
                                <span>Features</span>
                                <svg class="w-3 h-3 fill-current transition-transform duration-200"
                                    :class="{ 'rotate-180': featuresOpen }" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4.29289 8.29289C4.68342 7.90237 5.31658 7.90237 5.70711 8.29289L12 14.5858L18.2929 8.29289C18.6834 7.90237 19.3166 7.90237 19.7071 8.29289C20.0976 8.68342 20.0976 9.31658 19.7071 9.70711L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071L4.29289 9.70711C3.90237 9.31658 3.90237 8.68342 4.29289 8.29289Z"
                                            fill="#000000"></path>
                                    </g>
                                </svg>
                            </button>

                            <!-- Features Submenu -->
                            <div x-show="featuresOpen" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 -translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 -translate-y-2" class="ml-4 mt-1 space-y-1">
                                <a href="/features/unsubscribe"
                                    class="flex items-center gap-3 py-1.5 px-2 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                                    <div class="w-6 h-6 rounded bg-red-100 flex items-center justify-center">
                                        <svg class="w-3 h-3 text-red-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L18.364 5.636M5.636 18.364l12.728-12.728">
                                            </path>
                                        </svg>
                                    </div>
                                    <span class="text-sm">Unsubscribe Management</span>
                                </a>

                                <a href="/features/email-campaigns"
                                    class="flex items-center gap-3 py-1.5 px-2 text-gray-600 rounded-lg transition">
                                    <div class="w-6 h-6 rounded bg-purple-100 flex items-center justify-center">
                                        <svg class="w-3 h-3 text-purple-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <span class="text-sm flex-1">Email Campaigns</span>
                                    
                                </a>
                            </div>
                        </li>

                        <!-- Developers Mobile Menu -->
                        <li x-data="{ developersOpen: false }">
                            <button
                                class="flex items-center justify-between w-full text-gray-700 hover:bg-gray-100 rounded-lg py-1.5 px-2"
                                @click="developersOpen = !developersOpen">
                                <span>Developers</span>
                                <svg class="w-3 h-3 fill-current transition-transform duration-200"
                                    :class="{ 'rotate-180': developersOpen }" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4.29289 8.29289C4.68342 7.90237 5.31658 7.90237 5.70711 8.29289L12 14.5858L18.2929 8.29289C18.6834 7.90237 19.3166 7.90237 19.7071 8.29289C20.0976 8.68342 20.0976 9.31658 19.7071 9.70711L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071L4.29289 9.70711C3.90237 9.31658 3.90237 8.68342 4.29289 8.29289Z"
                                            fill="#000000"></path>
                                    </g>
                                </svg>
                            </button>

                            <!-- Developers Submenu -->
                            <div x-show="developersOpen" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 -translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 -translate-y-2" class="ml-4 mt-1 space-y-1">
                                <!-- Resources Section -->
                                <div class="mb-3">
                                    <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 px-2">
                                        Resources</h4>
                                    <div class="space-y-1">
                                        <a href="https://docs.isend.ai"
                                            class="flex items-center gap-3 py-1.5 px-2 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                                            <div
                                                class="w-6 h-6 rounded-lg bg-blue-100 flex items-center justify-center">
                                                <svg class="w-3 h-3 text-blue-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                                    </path>
                                                </svg>
                                            </div>
                                            <span class="text-sm">API Documentation</span>
                                        </a>

                                        <a href="https://discord.gg/isend"
                                            class="flex items-center gap-3 py-1.5 px-2 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                                            <div
                                                class="w-6 h-6 rounded-lg bg-purple-100 flex items-center justify-center">
                                                <svg class="w-3 h-3 text-purple-600" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515a.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0a12.64 12.64 0 0 0-.617-1.25a.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057a19.9 19.9 0 0 0 5.993 3.03a.078.078 0 0 0 .084-.028a14.09 14.09 0 0 0 1.226-1.994a.076.076 0 0 0-.041-.106a13.107 13.107 0 0 1-1.872-.892a.077.077 0 0 1-.008-.128a10.2 10.2 0 0 0 .372-.292a.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127a12.299 12.299 0 0 1-1.873.892a.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028a19.839 19.839 0 0 0 6.002-3.03a.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.956-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.955-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.946 2.418-2.157 2.418z" />
                                                </svg>
                                            </div>
                                            <span class="text-sm">Discord</span>
                                        </a>

                                        <a href="https://github.com/isend-ai"
                                            class="flex items-center gap-3 py-1.5 px-2 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                                            <div
                                                class="w-6 h-6 rounded-lg bg-gray-100 flex items-center justify-center">
                                                <svg class="w-3 h-3 text-gray-900" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                                                </svg>
                                            </div>
                                            <span class="text-sm">GitHub</span>
                                        </a>

                                        <a href="/arena"
                                            class="flex items-center gap-3 py-1.5 px-2 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                                            <div
                                                class="w-6 h-6 rounded-lg bg-green-100 flex items-center justify-center">
                                                <svg class="w-3 h-3 text-green-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4">
                                                    </path>
                                                </svg>
                                            </div>
                                            <span class="text-sm">Expressive TTS Arena</span>
                                        </a>
                                    </div>
                                </div>

                                <!-- Libraries Section -->
                                <div class="mb-3">
                                    <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 px-2">
                                        Libraries</h4>
                                    <div class="space-y-1">
                                        <a href="https://github.com/isend-ai/typescript-sdk"
                                            class="flex items-center gap-3 py-1.5 px-2 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                                            <div
                                                class="w-6 h-6 rounded-lg bg-blue-600 flex items-center justify-center">
                                                <span class="text-xs font-bold text-white">TS</span>
                                            </div>
                                            <span class="text-sm">TypeScript SDK</span>
                                        </a>

                                        <a href="https://github.com/isend-ai/react-sdk"
                                            class="flex items-center gap-3 py-1.5 px-2 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                                            <div
                                                class="w-6 h-6 rounded-lg bg-blue-500 flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M14.23 12.004a2.236 2.236 0 0 1-2.235 2.236 2.236 2.236 0 0 1-2.236-2.236 2.236 2.236 0 0 1 2.235-2.236 2.236 2.236 0 0 1 2.236 2.236zm2.648-10.69c-1.346 0-3.107.956-5.347 2.86-.5.4-1.01.8-1.52 1.2-.51-.4-1.02-.8-1.52-1.2C4.22 2.27 2.46 1.314 1.113 1.314c-.41 0-.75.34-.75.75v7.36c0 .41.34.75.75.75.41 0 .75-.34.75-.75V3.064c1.346 0 2.646.956 4.347 2.36.5.4 1.01.8 1.52 1.2.51-.4 1.02-.8 1.52-1.2 1.7-1.404 3-2.36 4.347-2.36v6.36c0 .41.34.75.75.75.41 0 .75-.34.75-.75V2.064c0-.41-.34-.75-.75-.75z" />
                                                </svg>
                                            </div>
                                            <span class="text-sm">React SDK</span>
                                        </a>

                                        <a href="https://github.com/isend-ai/python-sdk"
                                            class="flex items-center gap-3 py-1.5 px-2 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                                            <div
                                                class="w-6 h-6 rounded-lg bg-gradient-to-br from-blue-500 to-yellow-500 flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M12 0C5.372 0 0 5.372 0 12s5.372 12 12 12 12-5.372 12-12S18.628 0 12 0zm0 2c5.514 0 10 4.486 10 10s-4.486 10-10 10S2 17.514 2 12 6.486 2 12 2zm0 4c-3.314 0-6 2.686-6 6s2.686 6 6 6 6-2.686 6-6-2.686-6-6-6zm0 2c2.209 0 4 1.791 4 4s-1.791 4-4 4-4-1.791-4-4 1.791-4 4-4z" />
                                                </svg>
                                            </div>
                                            <span class="text-sm">Python SDK</span>
                                        </a>

                                        <a href="https://github.com/isend-ai/swift-sdk"
                                            class="flex items-center gap-3 py-1.5 px-2 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                                            <div
                                                class="w-6 h-6 rounded-lg bg-orange-500 flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M12 0C5.372 0 0 5.372 0 12s5.372 12 12 12 12-5.372 12-12S18.628 0 12 0zm0 2c5.514 0 10 4.486 10 10s-4.486 10-10 10S2 17.514 2 12 6.486 2 12 2zm0 4c-3.314 0-6 2.686-6 6s2.686 6 6 6 6-2.686 6-6-2.686-6-6-6zm0 2c2.209 0 4 1.791 4 4s-1.791 4-4 4-4-1.791-4-4 1.791-4 4-4z" />
                                                </svg>
                                            </div>
                                            <span class="text-sm">Swift SDK</span>
                                        </a>
                                    </div>
                                </div>

                                <!-- Integrations Section -->
                                <div>
                                    <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 px-2">
                                        Integrations</h4>
                                    <div class="space-y-1">
                                        <a href="https://github.com/isend-ai/livekit-agents"
                                            class="flex items-center gap-3 py-1.5 px-2 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                                            <div
                                                class="w-6 h-6 rounded-lg bg-gray-900 flex items-center justify-center">
                                                <span class="text-xs font-bold text-white">L</span>
                                            </div>
                                            <span class="text-sm">LiveKit Agents</span>
                                        </a>

                                        <a href="https://github.com/isend-ai/twilio-integration"
                                            class="flex items-center gap-3 py-1.5 px-2 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                                            <div class="w-6 h-6 rounded-lg bg-red-500 flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                                                </svg>
                                            </div>
                                            <span class="text-sm">Twilio</span>
                                        </a>

                                        <a href="https://github.com/isend-ai/vercel-ai-sdk"
                                            class="flex items-center gap-3 py-1.5 px-2 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                                            <div class="w-6 h-6 rounded-lg bg-black flex items-center justify-center">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                                                </svg>
                                            </div>
                                            <span class="text-sm">Vercel AI SDK</span>
                                        </a>

                                        <a href="https://github.com/isend-ai/hume-mcp-server"
                                            class="flex items-center gap-3 py-1.5 px-2 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                                            <div
                                                class="w-6 h-6 rounded-lg bg-blue-100 flex items-center justify-center">
                                                <svg class="w-3 h-3 text-blue-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4">
                                                    </path>
                                                </svg>
                                            </div>
                                            <span class="text-sm">Hume MCP Server</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <a class="flex text-gray-700 hover:bg-gray-100 rounded-lg py-1.5 px-2"
                                href="/pricing">Pricing</a>
                        </li>
                        <li>
                            <a class="flex text-gray-700 hover:bg-gray-100 rounded-lg py-1.5 px-2"
                                href="/email-templates">Templates</a>
                        </li>
                        <li>
                            <a class="flex text-gray-700 hover:bg-gray-100 rounded-lg py-1.5 px-2"
                                href="https://blog.isend.ai">Blog</a>
                        </li>
                    </ul>
                </nav>

            </div>

        </div>
    </div>
</header>