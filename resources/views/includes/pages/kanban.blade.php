@extends('layouts.account')

@section('account-site-title', 'Keeper - аккаунт ('. Auth::user()->name .')')

@section('content')
   @include('includes.widgets.kanbanbar')
   <div class="kanban-board">
      <div id="group-lists" class="lists">
         @foreach ($groups as $group)
            <div class="list" id="{{ $group->id }}">
               @foreach ($kanbans as $kanban)
                  @if ($kanban->group_id == $group->id)
                     <div id="{{ $kanban->task_id }}" class="flex flex-col p-2 w-full bg-white rounded shadow mb-2 list-item" draggable="true">
                        <div class="flex items-start justify-start mb-2">
                           {{-- <div class="flex-shrink-0 w-8"></div> --}}
                           <div class="ml-2">
                              <div class="text-sm font-bold">{{ $kanban->tasks->name }}</div>
                              <div class="text-xs text-gray-500">{{ $kanban->tasks->description }}</div>
                           </div>
                        </div>
                        <div class="flex flex-row items-center justify-start space-x-1">
                           <div class="flex items-center justify-start p-2 space-x-2">
                              <div class="flex-shrink-0"> {!! file_get_contents(asset('images/kanban/kanban-tag-icon.svg')) !!} </div>
                              <div class="text-sm">{{ $kanban->tasks->level }}</div>
                           </div>
                           <div class="flex items-center justify-start p-2 space-x-2">
                              <div class="flex-shrink-0"> {!! file_get_contents(asset('images/kanban/kanban-type-icon.svg')) !!} </div>
                              <div class="text-sm">{{ $kanban->tasks->type }}</div>
                           </div>
                           <div class="flex items-center justify-start p-2 space-x-2">
                              <div class="flex-shrink-0"> {!! file_get_contents(asset('images/kanban/kanban-worker-icon.svg')) !!} </div>
                              <div class="text-sm">{{ $kanban->tasks->users->name }}</div>
                           </div>
                        </div>
                        <div class="flex flex-row items-center justify-start space-x-1">
                           <div class="flex items-center justify-start p-2 space-x-2">
                              <div class="flex-shrink-0"> {!! file_get_contents(asset('images/kanban/kanban-time-icon.svg')) !!} </div>
                              <div class="text-sm">{{ $kanban->tasks->endpoint }}</div>
                           </div>
                        </div>
                     </div>
                  @endif
               @endforeach
               
            </div>
         @endforeach
      </div>
   </div>
@endsection