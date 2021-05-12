@foreach ($project as $element) @endforeach
<div class="container">
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 id="nameUnit" class="h2">{{ $element->name }}</h1>
      <div class="text-content"></div>
      <div class="btn-toolbar mb-2 mb-md-0">
         <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#modal-create-new-group">Добавить новую группу</button>
            <button type="button" class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#modal-create-new-task">Добавить новую проектную задачу</button>
         </div>
      </div>
   </div>
</div>

{{--  --}}
<div class="modal fade" id="modal-create-new-group" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Создание новой группы</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form method="POST">
            @csrf
            <div class="modal-body">  
               <div class="flex flex-col pt-1">
                  <label class="text-lg" for="name">{{ __('Наименование группы') }}</label>
                  <div class="name-project-box">
                     <input id="group-name" name="name" type="text" class="form-control" placeholder="Название новой группы">
                  </div>
               </div>
               <label class="hidden" id="project">{{ $element->id }}</label>
            </div>
         </form>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
            <button id="kanban-group-create" type="button" class="btn btn-success">Создать группу</button>
         </div>
      </div>
   </div>
</div>

{{--  --}}
<div class="modal fade" id="modal-create-new-task" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Создание новой программной задачи</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form method="POST">
            @csrf
            <div class="modal-body">  
               <div class="flex flex-col pt-1">
                  <label class="text-lg" for="name">{{ __('Наименование новой проектной задачи') }}</label>
                  <div class="name-task-box">
                     <input id="name" name="name" type="text" class="form-control" placeholder="Название проектной задачи">
                  </div>
               </div>
               <div class="flex flex-col pt-2">
                  <label class="text-lg" for="description">{{ __('Краткое описание проектной задачи') }}</label>
                  <div class="description-task-box">
                     <div class="mt-1">
                        <textarea id="description" name="description" rows="3" class="shadow-sm form-control focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Описание ..."></textarea>
                     </div>
                     <p class="mt-2 text-sm text-gray-500">{{ __('Описание нового программного проекта (25 символов).') }}</p>
                  </div>
               </div>
               <div class="flex flex-col pt-1">
                  <label class="text-lg " for="type">{{ __('Тип проектной задачи') }}</label>
                  <div class="name-task-box">
                     <select id="type" name="type" class="form-select form-control">
                        <option selected>Выбор типа задачи</option>
                        <option value="simple">Простое выполнение</option>
                        <option value="load">Загрузка файла</option>
                        <option value="expectation">Ожидание файла</option>
                     </select>
                  </div>
               </div>
               <div class="flex flex-col pt-1">
                  <label class="text-lg" for="lavel">{{ __('Уровень проектной задачи') }}</label>
                  <div class="name-tesk-box">
                     <select id="lavel" name="lavel" class="form-select form-control">
                        <option selected>Выбор уровня задачи</option>
                        <option value="small">Мылый приоритет</option>
                        <option value="middle">Средний приоритет</option>
                        <option value="hard">Высокий приоритет</option>
                     </select>
                  </div>
               </div>
               <div class="flex flex-col pt-1">
                  <label class="text-lg" for="endpoint">{{ __('Конечное время сдачи') }}</label>
                  <div class="name-task-box">
                     <input id="endpoint" name="endpoint" type="date" class="form-control">
                  </div>
               </div>
               <div class="flex flex-col pt-1">
                  <label class="text-lg" for="worker">{{ __('Работник') }}</label>
                  <div class="name-task-box">
                     <select id="worker" name="worker" class="form-select form-control">
                        <option selected>Выбор работника для выполнения</option>
                        @foreach ($workers as $worker)
                           <option value="{{ $worker->id }}">{{$worker->name}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="flex flex-col pt-1">
                  <label class="text-lg" for="worker">{{ __('Рабочая группа') }}</label>
                  <div class="name-task-box">
                     <select id="group" name="group" class="form-select form-control">
                        <option selected>Выбо статротов группы</option>
                        @foreach ($groups as $group)
                           <option value="{{ $group->id }}">{{$group->name}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
            </div>
         </form>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
            <button id="kanban-task-create" type="button" class="btn btn-success">Создать группу</button>
         </div>
      </div>
   </div>
</div>