<div class="container">
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 id="nameUnit" class="h2">{{ __('Библеотека проектов')}}</h1>
      <div class="text-content"></div>
      <div class="btn-toolbar mb-2 mb-md-0">
         <div class="btn-group mr-2">
            <button type="button" data-toggle="modal" data-target="#modal-create-project" class="h-10 mr-1 px-5 text-gray-700 transition-colors duration-150 border border-indigo-500 rounded-lg focus:shadow-outline hover:bg-purple-400 hover:text-white">Сформировать новый проект</button>
         </div>
      </div>
   </div>
</div>

{{-- Модальная форма для создания нового программного проекта --}}
<div class="modal fade" id="modal-create-project" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Создание нового программного проекта</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true" class="text-red-600">&times;</span>
            </button>
         </div>
         <form method="POST" action="{{ route('account-project-create') }}">
            @csrf
            <div class="modal-body">  
               <div class="flex flex-col pt-1">
                  <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Наименование нового проекта') }}</label>
                  <div class="name-project-box">
                     <input id="name" name="name" type="text" class="form-control" placeholder="Название программного проекта">
                  </div>
               </div>
               <div class="flex flex-col pt-2">
                 <label for="description" class="block text-sm font-medium text-gray-700">{{ __('Описание проекта') }}</label>
                 <div class="description-project-box mb-1">
                     <textarea id="description" name="description" rows="3" class="shadow-sm form-control focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Описание нового проекта"></textarea>
                 </div>
               </div>
               <div class="flex flex-col pt-1">
                  <label for="path" class="block text-sm font-medium text-gray-700">{{ __('Наименование проектной директории') }}</label>
                  <div class="name-project-box">
                     <input id="path" name="path" type="text" class="form-control" placeholder="Наименование директории">
                  </div>
                  <p class="mt-2 text-sm text-gray-500">{{ __('Используете англ. буквы и цифры без символов и пробелов') }}</p>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" data-dismiss="modal" class="mt-1 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 text-white bg-red-500 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                  Закрыть
               </button>
               <button type="submit" class="mt-1 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                  Создать новый программный проект
               </button>
            </div>
         </form>
      </div>
   </div>
</div>