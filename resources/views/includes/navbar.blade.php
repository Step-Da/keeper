<div style="min-height: 700px"
    class="w-64 absolute lg:relative bg-white shadow h-screen flex-col justify-between hidden lg:flex pb-12">
    <div class="px-8">
        <div class="h-16 w-full flex items-center toggleColour">
            <p class="text-gray-800 no-underline hover:no-underline font-bold text-2xl lg:text-4xl">{{ __('Keeper') }}</p>
        </div>
        <ul class="mt-12">
            <li class="flex w-full justify-between text-gray-600 cursor-pointer items-center mb-6">
                <div class="flex items-center">
                    <div class="flex items-center justify-center text-xs">
                        <a class="text-tg" href="{{ route('account-main-page') }}">
                            <i class="fas fa-qrcode mr-3"></i>
                            <span class="text-sm">Главная</span>
                        </a>
                    </div>
                </div>
            </li>
            <li class="flex w-full justify-between text-gray-600 hover:text-indigo-700 cursor-pointer items-center mb-6">
                <div class="flex items-center">
                    <div class="flex items-center justify-center text-xs">
                        <a class="text-tg" href="{{ route('account-users-page') }}">
                            <i class="fas fa-user-friends mr-3"></i>
                            <span class="text-sm">Пользователи</span>
                        </a>   
                    </div>
                </div>
            </li>
            <li class="flex w-full justify-between text-gray-600 hover:text-indigo-700 cursor-pointer items-center mb-6">
                <div class="flex items-center">
                    <div class="flex items-center justify-center text-xs">
                        <a class="text-tg" href="{{ route('account-projects-page') }}">
                            <i class="fas fa-project-diagram mr-3"></i>
                            <span class="text-sm">Проекты</span>
                        </a>
                    </div>    
                </div>
            </li>
            <li class="flex w-full justify-between text-gray-600 hover:text-indigo-700 cursor-pointer items-center mb-6">
                <div class="flex items-center">
                    <div class="flex items-center justify-center text-xs">
                        <a class="text-tg" href="{{ route('account-todos-page') }}">
                            <i class="fas fa-tasks mr-3"></i>
                            <span class="text-sm">Общие задачи</span>
                        </a>
                    </div>    
                </div>
            </li>
        </ul>
    </div>
</div>