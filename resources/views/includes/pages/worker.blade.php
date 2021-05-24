@extends('layouts.account')

@section('account-site-title', 'Keeper - аккаунт ('. Auth::user()->name .')')

@section('content')
<div class="tasks-worker-table">
   @foreach ($projects as $project)
      <div class="table-counter" data-table_id="{{ $project->id }}">
         <header class="table-worker-header">
            <h2 class="text-white font-sans text-base">{{ $project->name }}
            {{-- </h2><hr class="border"> --}}
            <div class="row-table">
               <div class="worker-table-column task-status">Статус</div>
               <div class="worker-table-column task-name">Наименование</div>
               <div class="worker-table-column task-type">Тип</div>
               <div class="worker-table-column task-level">Уровень</div>
               <div class="worker-table-column ">Дата выполнения</div>
            </div>
         </header>
         <div class="table-body">
            @foreach ($kanbans as $kanban)
               @if (($kanban->groups->project_id == $project->id) && ($kanban->tasks->worker_id == Auth::user()->id))
                  <div class="row-table">
                     <div class="worker-table-column task-status">
                        <samp class="flex-shrink-0">
                           <i class="{{ $kanban->tasks->status ? ('far fa-check-circle text-green-500') : ('fas fa-times text-red-500') }}"></i>
                        </samp>
                     </div>
                     <div class="worker-table-column task-name">{{ $kanban->tasks->name }}</div>
                     <div class="worker-table-column task-type">{{ $kanban->tasks->type }}</div>
                     <div class="worker-table-column task-level">{{ $kanban->tasks->level }}</div>
                     <div class="worker-table-column task-endpoint">{{ substr($kanban->tasks->endpoint, 0, strpos($kanban->tasks->endpoint, ' ' ))}}</div>
                     <div class="worker-table-column task-endpoint">
                        <span id="{{ $kanban->tasks->id }}" class="cursor-pointer hover:text-yellow-600"><i class="far fa-eye"></i></span>
                     </div>
                  </div>
               @endif   
            @endforeach
         </div>
      </div>
   @endforeach
</div>
@endsection