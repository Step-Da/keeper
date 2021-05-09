<nav class="h-16 flex items-center lg:items-stretch justify-end lg:justify-between bg-white shadow relative z-0">
    <div class="hidden lg:flex w-full pr-6">
        <div class="w-1/2 h-full hidden lg:flex items-center pl-6 pr-24">
            <div class="relative w-full">
                <div class="text-gray-500 absolute ml-3 mt-2.5">
                    <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="stroke-current h-4 w-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </div>
                <input id="search-field" type="text" placeholder="Поиск ..." class="border border-gray-100 focus:outline-none focus:border-indigo-700 rounded w-full text-sm text-gray-500 bg-gray-100 pl-12 py-2"/>
            </div>
        </div>
        <div class="w-1/2 hidden lg:flex">
            <div class="w-full flex items-center pl-8 justify-end">
                <div class="h-full w-20 flex items-center justify-center border-r mr-4 cursor-pointer text-gray-600"></div>
                <div id="account-dropdawn-list" class="flex items-center relative cursor-pointer">
                    <div class="rounded-full">
                        <ul class="p-2 w-full border-r bg-white absolute rounded left-0 shadow mt-12 sm:mt-16 hidden">
                            <li class="flex w-full justify-between text-gray-600 hover:text-indigo-700 cursor-pointer items-center mt-2">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-logout" width="20" height="20"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <path
                                            d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                        <path d="M7 12h14l-3 -3m0 6l3 -3" />
                                    </svg>
                                    <a class="text-sm ml-2" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Выход') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <p class="text-gray-800 text-sm mx-3">{{ Auth::user()->name }}</p>
                    <div class="cursor-pointer text-gray-600">
                        <svg aria-haspopup="true" xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-chevron-down" width="20" height="20"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <polyline points="6 9 12 15 18 9" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-gray-600 mr-8 visible lg:hidden relative" onclick="sidebarHandler(true)" >
        <svg aria-label="Main Menu" aria-haspopup="true" xmlns="http://www.w3.org/2000/svg"
            class="icon icon-tabler icon-tabler-menu cursor-pointer" width="30" height="30"
            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" />
            <line x1="4" y1="8" x2="20" y2="8" />
            <line x1="4" y1="16" x2="20" y2="16" />
        </svg>
    </div>
</nav>