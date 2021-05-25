@foreach ($project as $element) @endforeach

<div class="container">
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 id="nameUnit" class="h2">{{ $element->name }}</h1>
      <div class="text-content"></div>
      <div class="btn-toolbar mb-2 mb-md-0">
         <div class="btn-group mr-2">
            <button type="button" data-toggle="modal" data-target="#modal-create-new-group" class="h-10 mr-1 px-5 text-gray-700 transition-colors duration-150 border border-indigo-500 rounded-lg focus:shadow-outline hover:bg-purple-400 hover:text-white">Добавить новую группу</button>
            <button type="button" data-toggle="modal" data-target="#modal-create-new-task" class="h-10 mr-1 px-5 text-gray-700 transition-colors duration-150 border border-indigo-500 rounded-lg focus:shadow-outline hover:bg-purple-400 hover:text-white">Добавить новую проектную задачу</button>
         </div>
      </div>
   </div>
</div>

{{-- Модальная форма для создания логических групп --}}
<div class="modal fade" id="modal-create-new-group" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Создание новой логической группы</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true" class="text-red-600">&times;</span>
            </button>
         </div>
         <form method="POST">
            @csrf
            <div class="modal-body">  
               <div class="flex flex-col pt-1">
                  <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Наименование группы') }}</label>
                  <div class="name-project-box">
                     <input id="group-name" name="name" type="text" class="form-control" placeholder="Название новой группы">
                     <div id="error-alter" class="alert alert-danger mt-2 hidden"></div>
                  </div>
               </div>
               <label class="hidden" id="project">{{ $element->id }}</label>
            </div>
         </form>
         <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="mt-1 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 text-white bg-red-500 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
               Закрыть
            </button>
            <button id="kanban-group-create" type="submit" class="mt-1 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
               Добавить новую группу
            </button>
         </div>
      </div>
   </div>
</div>

{{-- Модальная форма для создания новой проектной задачи --}}
<div class="modal fade" id="modal-create-new-task" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Создания новой проектной задачи</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true" class="text-red-600">&times;</span>
            </button>
         </div>
         <form method="POST" action="{{ route('account-create-task') }}">
            @csrf
            <div class="modal-body">  
               <div class="flex flex-col pt-1">
                  <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Наименование новой проектной задачи') }}</label>
                  <div class="name-task-box">
                     <input id="name" name="name" type="text" class="form-control" placeholder="Название проектной задачи">
                  </div>
               </div>
               <div class="flex flex-col pt-2">
                  <label for="description" class="block text-sm font-medium text-gray-700">{{ __('Описание проектной задачи') }}</label>
                  <div class="description-task-box">
                     <div class="mt-1">
                        <textarea id="description" name="description" rows="3" class="form-control focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Описание ..."></textarea>
                     </div>
                  </div>
               </div>
               <div class="row mt-1">
                  <div class="col-4 col-sm-6">
                     <div class="flex flex-col pt-1">
                        <label for="type" class="block text-sm font-medium text-gray-700">{{ __('Тип проектной задачи') }}</label>
                        <div class="inline-block relative">
                           <select id="type" name="type" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded leading-tight focus:outline-none">
                             <option disabled selected>Выбор типа задачи</option>
                             <option value="simple">Простое выполнение</option>
                             <option value="load">Загрузка файла</option>
                           </select>
                           <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                 <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                              </svg>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-4 col-sm-6">
                     <div class="flex flex-col pt-1">
                        <label for="level" class="block text-sm font-medium text-gray-700">{{ __('Уровень проектной задачи') }}</label>
                        <div class="inline-block relative">
                           <select id="level" name="level" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded leading-tight focus:outline-none">
                             <option disabled selected>Выбор уровня задачи</option>
                             <option value="small">Мылый приоритет</option>
                             <option value="middle">Средний приоритет</option>
                             <option value="hard">Высокий приоритет</option>
                           </select>
                           <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                 <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                              </svg>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row mt-1">
                  <div class="col-4 col-sm-6">
                     <div class="flex flex-col pt-1">
                        <label for="group" class="block text-sm font-medium text-gray-700">{{ __('Логическая группа') }}</label>
                        <div class="inline-block relative">
                           <select id="group" name="group" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded leading-tight focus:outline-none">
                              <option disabled selected>Выбор группы</option>
                              @foreach ($groups as $group)
                                 <option value="{{ $group->id }}">{{ $group->name }}</option>
                              @endforeach
                           </select>
                           <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                 <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                              </svg>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-4 col-sm-6">
                     <div class="flex flex-col pt-1">
                        <label for="worker" class="block text-sm font-medium text-gray-700">{{ __('Исполнитель') }}</label>
                        <div class="inline-block relative">
                           <select id="worker" name="worker" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded leading-tight focus:outline-none">
                              <option disabled selected>Назначение рабочего</option>
                              @foreach ($workers as $worker)
                                 <option value="{{ $worker->id }}">{{ $worker->name }}</option>
                              @endforeach
                           </select>
                           <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                 <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                              </svg>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="flex flex-col pt-1">
                  <label for="endpoint" class="block text-sm font-medium text-gray-700">{{ __('Время исполнения задачи') }}</label>
                  <div class="name-task-box">
                     <input id="endpoint" name="endpoint" type="date" class="form-control" min="{{ date('Y-m-d') }}">
                  </div>
               </div>
               <input id="project" name="project" value="{{ $element->id }}" class="hidden">
            </div>
            <div class="modal-footer">
               <button type="button" data-dismiss="modal" class="mt-1 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 text-white bg-red-500 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                  Закрыть
               </button>
               <button type="submit" class="mt-1 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                  Добавить новую проектную задачу
               </button>
            </div>
         </form>
      </div>
   </div>
</div>