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
         @if (!$task->status)
            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4">
               <p class="text-gray-600">Выполнение задачи</p>
                  @switch($task->type)
                     @case('load')
                        <form method="POST" action="{{ route('account-cpmpleted-task') }}" enctype="multipart/form-data">
                           @csrf
                           <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                              <div class="space-y-1 text-center">
                                 <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                   <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                 </svg>
                                 <div class="flex text-sm text-gray-600">
                                    <label for="file" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                       <span>Загрузите файл</span>
                                       <input id="file" name="file" type="file" class="absolute opacity-0" required>
                                    </label>
                                   <p class="pl-1">или перетащите его сюда</p>
                                 </div>
                                 <p id="file-name" class="text-xs text-gray-500">Загрузка файла любого формата</p>
                              </div>
                           </div>
                           <div class="flex flex-col pt-1">
                              <label for="path" class="block text-sm font-medium text-gray-700">{{ __('Наименование дополнительной директории') }}</label>
                              <div class="name-project-box mb-2">
                                 <input id="path" name="path" type="text" class="form-control" placeholder="Введите название директории, если это необходимо">
                              </div>
                           </div>
                           <input id="task" name="task" class="hidden" type="text" value="{{ $task->id }}">
                           <input id="project" name="project" class="hidden" type="text" value="{{ $project->id }}">
                           <button type="submit" class="w-100 rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm: sm:w-auto sm:text-sm">
                              {{ __('Завершить поставленную задачу') }}
                           </button>
                        </form>
                     @break
                     @default
                        <button id="{{ $task->id }}" type="submit" class="worker-clouse-task w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm: sm:w-auto sm:text-sm">
                           {{ __('Завершить поставленную задачу') }}
                        </button>
                  @endswitch
                        
                        
                  {{-- <div class="border-2 flex items-center p-2 rounded justify-between space-x-2">
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
                   </div> --}}
            </div>
         @endif
      </div>
    </div>
</div>
@endsection