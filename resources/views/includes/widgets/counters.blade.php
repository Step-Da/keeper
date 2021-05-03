<div class="flex space-x-4">
    <div class="w-full lg:w-1/4 shadow-sm">
        <div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
            <div class="flex flex-row items-center justify-between">
                <div class="flex flex-col">
                    <div class="text-xs uppercase font-light text-gray-500">Глобальные задачи</div>
                    <div class="text-xl font-bold text-yellow-600 counter">{{ $todo }}</div>
                </div>
                <img class="w-10 h-10" src="{{ asset('images/account/to-do-list.svg')}}">
            </div>
        </div>
    </div>
    <div class="w-full lg:w-1/4 shadow-sm">
        <div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
            <div class="flex flex-row items-center justify-between">
                <div class="flex flex-col">
                    <div class="text-xs uppercase font-light text-gray-500">Проекты в разработке</div>
                    <div class="text-xl font-bold text-yellow-600 counter">10</div>
                </div>
                <img class="w-10 h-10" src="{{ asset('images/account/progect.svg')}}">
            </div>
        </div>
    </div>
    <div class="w-full lg:w-1/4 shadow-sm">
        <div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
            <div class="flex flex-row items-center justify-between">
                <div class="flex flex-col">
                    <div class="text-xs uppercase font-light text-gray-500">Сотрудники</div>
                    <div class="text-xl font-bold text-yellow-600 counter">50</div>
                </div>
                <img class="w-10 h-10" src="{{ asset('images/account/staff-group.svg')}}">
            </div>
        </div>
    </div>
    <div class="w-full lg:w-1/4 shadow-sm">
        <div class="widget w-full p-4 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
            <div class="flex flex-row items-center justify-between">
                <div class="flex flex-col">
                    <div class="text-xs uppercase font-light text-gray-500">Ошибки при разработке</div>
                    <div class="text-xl font-bold text-yellow-600 counter">{{ $todo }}</div>
                </div>
                <img class="w-10 h-10" src="{{ asset('images/account/error.svg')}}">
            </div>
        </div>
    </div>
</div>