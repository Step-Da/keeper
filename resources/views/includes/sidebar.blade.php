<nav class="h-16 flex items-center lg:items-stretch justify-end lg:justify-between bg-white shadow relative z-0">
    <div class="hidden lg:flex w-full pr-6">
        <div class="w-full h-full hidden lg:flex items-center pl-6 pr-24">
            <div class="relative w-full">
                <div class="text-gray-500 absolute ml-3 mt-2.5"> {!! file_get_contents(asset('images/sidebar/sidebar-search-icon.svg')) !!} </div>
                <input id="search-field" type="text" placeholder="Поиск ..." class="border border-gray-100 focus:outline-none focus:border-indigo-700 rounded w-full text-sm text-gray-500 bg-gray-100 pl-12 py-2"/>
            </div>
        </div>
        <div class="w-1/2 hidden lg:flex">
            <div class="w-full flex items-center pl-8 justify-end">
                <div class="h-full w-20 flex items-center justify-center border-r mr-4 cursor-pointer text-gray-600"></div>
                <div id="account-dropdawn-list" class="flex items-center relative cursor-pointer">
                    <div class="rounded-full w-6">
                        <ul class="p-2 w-full border-r bg-white absolute rounded left-0 shadow mt-5 sm:mt-16 hidden">
                            <li class="flex w-full justify-between text-gray-600">
                                <div class="flex items-center">
                                    {!! file_get_contents(asset('images/sidebar/sidebar-role-icon.svg')) !!}
                                    <span class="text-sm ml-2">{{ Auth::user()->role == 'manager' ? ('Менеджер') : ('Работник') }}</span>
                                </div>
                            </li>
                            <li class="flex w-full justify-between text-gray-600 hover:text-indigo-700 cursor-pointer items-center mt-2">
                                <div class="flex items-center">
                                    {!! file_get_contents(asset('images/sidebar/sidebar-exit-icon.svg')) !!}
                                    <a class="text-sm ml-2" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
                        {!! file_get_contents(asset('images/sidebar/sidebar-openteg-icon.svg')) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>