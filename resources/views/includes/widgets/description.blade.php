@extends('layouts.account')

@section('account-site-title', 'Keeper - аккаунт ('. Auth::user()->name .')')

@section('content')
<div class="flex items-center justify-center px-4">
    <div class="max-w-4xl  bg-white w-full rounded-lg shadow-xl">
        <div class="p-4 border-b">
            <h2 class="text-2xl"> {{ __('Проект: ').$project->name }}</h2>
            <p class="text-sm text-gray-500">Информация о проектной задачи.</p>
        </div>
        <div>
            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                <p class="text-gray-600">Наименование задачи</p>
                <p>{{ $task->name }}</p>
            </div>
            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                <p class="text-gray-600">Описание проектной задачи</p>
                <p>{{ $task->description }}</p>
            </div>
            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                <p class="text-gray-600">Время выполнения и статус</p>
                <p>
                    {{ date('d-m-Y', strtotime(substr($task->endpoint, 0, strpos($task->endpoint, ' ' ))))}}
                    (<span class="{{ $task->status ? ('text-green-400') : ('text-red-400') }}">
                        {{ $task->status ? ('Задача выполнена') : ('Задача не выполнена') }}
                    </span>)
                </p>
            </div>
            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                <p class="text-gray-600">Уровень</p>
                <p>
                    @switch($task->level)
                        @case('middle')
                            <span class="text-yellow-400 ">{!! file_get_contents(asset('images/kanban/kanban-tag-icon.svg')) !!}</span>
                            <span class="">Средний приоритет</span>         
                        @break
                        @case('hard')
                            <span class="text-red-400 ">{!! file_get_contents(asset('images/kanban/kanban-tag-icon.svg')) !!}</span>
                            <span class="">Высокий приоритет</span>   
                        @break
                        @default
                            <span class="text-green-400 ">{!! file_get_contents(asset('images/kanban/kanban-tag-icon.svg')) !!}</span>
                            <span class="">Малый приоритет</span>   
                    @endswitch
                </p>
            </div>
            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                <p class="text-gray-600">Дата создания задачи</p>
                <p>{{ date('d-m-Y', strtotime(substr($task->created_at, 0, strpos($task->created_at, ' ' ))))}}</p>
            </div>
            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4">
                {{-- <p class="text-gray-600">
                    Attachments
                </p>
                <div class="space-y-2">
                    <div class="border-2 flex items-center p-2 rounded justify-between space-x-2">
                        <div class="space-x-2 truncate">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current inline text-gray-500" width="24" height="24" viewBox="0 0 24 24"><path d="M17 5v12c0 2.757-2.243 5-5 5s-5-2.243-5-5v-12c0-1.654 1.346-3 3-3s3 1.346 3 3v9c0 .551-.449 1-1 1s-1-.449-1-1v-8h-2v8c0 1.657 1.343 3 3 3s3-1.343 3-3v-9c0-2.761-2.239-5-5-5s-5 2.239-5 5v12c0 3.866 3.134 7 7 7s7-3.134 7-7v-12h-2z"/></svg>
                            <span>
                                resume_for_manager.pdf
                            </span>
                        </div>
                        <a href="#" class="text-purple-700 hover:underline">
                            Download
                        </a>
                    </div>

                    <div class="border-2 flex items-center p-2 rounded justify-between space-x-2">
                        <div class="space-x-2 truncate">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current inline text-gray-500" width="24" height="24" viewBox="0 0 24 24"><path d="M17 5v12c0 2.757-2.243 5-5 5s-5-2.243-5-5v-12c0-1.654 1.346-3 3-3s3 1.346 3 3v9c0 .551-.449 1-1 1s-1-.449-1-1v-8h-2v8c0 1.657 1.343 3 3 3s3-1.343 3-3v-9c0-2.761-2.239-5-5-5s-5 2.239-5 5v12c0 3.866 3.134 7 7 7s7-3.134 7-7v-12h-2z"/></svg>
                            <span>
                                resume_for_manager.pdf
                            </span>
                        </div>
                        <a href="#" class="text-purple-700 hover:underline">
                            Download
                        </a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection