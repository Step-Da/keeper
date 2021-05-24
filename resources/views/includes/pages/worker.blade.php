@extends('layouts.account')

@section('account-site-title', 'Keeper - аккаунт ('. Auth::user()->name .')')

@section('content')
<div class="tasks-worker-table">
   <div class="table-counter" data-table_id="0">
      <header class="table-worker-header">
         <h2 class="text-white font-sans text-base">Наименование проекта</h2>
         <div class="row-table">
            <div class="worker-table-column task-status">Статус</div>
            <div class="worker-table-column task-name">Наименование</div>
            <div class="worker-table-column task-type">Тип</div>
            <div class="worker-table-column task-level">Уровень</div>
            <div class="worker-table-column ">Дата выполнения</div>
         </div>
      </header>
      <div class="table-body">
         <div class="row-table">
            <div class="worker-table-column task-status">0</div>
            <div class="worker-table-column task-name">Задача</div>
            <div class="worker-table-column task-type">Обычная</div>
            <div class="worker-table-column task-level">Высокий</div>
            <div class="worker-table-column task-endpoint">24.05.2021</div>
            <div class="worker-table-column task-endpoint">
               <span class="cursor-pointer hover:text-yellow-600"><i class="far fa-eye"></i></span>
            </div>
         </div>
         <div class="row-table">
            <div class="worker-table-column task-status">0</div>
            <div class="worker-table-column task-name">Задача</div>
            <div class="worker-table-column task-type">Обычная</div>
            <div class="worker-table-column task-level">Высокий</div>
            <div class="worker-table-column task-endpoint">24.05.2021</div>
            <div class="worker-table-column task-endpoint">
               <span class="cursor-pointer hover:text-yellow-600"><i class="far fa-eye"></i></span>
            </div>
         </div>
         <div class="row-table">
            <div class="worker-table-column task-status">0</div>
            <div class="worker-table-column task-name">Задача</div>
            <div class="worker-table-column task-type">Обычная</div>
            <div class="worker-table-column task-level">Высокий</div>
            <div class="worker-table-column task-endpoint">24.05.2021</div>
            <div class="worker-table-column task-endpoint">
               <span class="cursor-pointer hover:text-yellow-600"><i class="far fa-eye"></i></span>
            </div>
         </div>
         <div class="row-table">
            <div class="worker-table-column task-status">0</div>
            <div class="worker-table-column task-name">Задача</div>
            <div class="worker-table-column task-type">Обычная</div>
            <div class="worker-table-column task-level">Высокий</div>
            <div class="worker-table-column task-endpoint">24.05.2021</div>
            <div class="worker-table-column task-endpoint">
               <span class="cursor-pointer hover:text-yellow-600"><i class="far fa-eye"></i></span>
            </div>
         </div>
         <div class="row-table">
            <div class="worker-table-column task-status">0</div>
            <div class="worker-table-column task-name">Задача</div>
            <div class="worker-table-column task-type">Обычная</div>
            <div class="worker-table-column task-level">Высокий</div>
            <div class="worker-table-column task-endpoint">24.05.2021</div>
            <div class="worker-table-column task-endpoint">
               <span class="cursor-pointer hover:text-yellow-600"><i class="far fa-eye"></i></span>
            </div>
         </div>
         <div class="row-table">
            <div class="worker-table-column task-status">0</div>
            <div class="worker-table-column task-name">Задача</div>
            <div class="worker-table-column task-type">Обычная</div>
            <div class="worker-table-column task-level">Высокий</div>
            <div class="worker-table-column task-endpoint">24.05.2021</div>
            <div class="worker-table-column task-endpoint">
               <span class="cursor-pointer hover:text-yellow-600"><i class="far fa-eye"></i></span>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection