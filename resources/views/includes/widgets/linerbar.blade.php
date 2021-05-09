<div class="container">
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 id="nameUnit" class="h2">{{ __('Библеотека проектов')}}</h1>
      <div class="text-content"></div>
      <div class="btn-toolbar mb-2 mb-md-0">
         <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#modal-description">Сформировать новый проект</button>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="modal-description" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Создание нового программного проекта</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <form method="POST" action="{{ route('account-project-create') }}">
               @csrf
               <div class="modal-body">  
                  <div class="flex flex-col pt-1">
                     <label class="text-lg" for="name">{{ __('Наименование нового проекта') }}</label>
                     <div class="name-project-box">
                        <input id="name" name="name" type="text" class="form-control" placeholder="Имя нового программного проекта">
                     </div>
                  </div>
                  <div class="flex flex-col pt-2">
                    <label for="about" class="text-lg" for="description">{{ __('Краткое описание проекта') }}</label>
                    <div class="description-project-box">
                        <div class="mt-1">
                           <textarea id="description" name="description" rows="3" class="shadow-sm form-control focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Описание нового проекта"></textarea>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">{{ __('Описание нового программного проекта (40 символов).') }}</p>
                    </div>
                  </div>
                  <div class="flex flex-col pt-1">
                     <label class="text-lg" for="path">{{ __('Путь') }}</label>
                     <div class="name-project-box">
                        <input id="path" name="path" type="text" class="form-control" placeholder="Имя нового программного проекта">
                     </div>
                  </div>
                    
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
                  <button type="submit" class="btn btn-success">Создать проект</button>
               </div>
            </form>
       </div>
   </div>
</div>