@extends('layouts.account')

@section('account-site-title', 'Keeper - аккаунт ('. Auth::user()->name .')')

@section('content')
   @include('includes.widgets.kanbanbar')
   <div class="kanban-board">
      <div id="group-lists" class="lists row">
         @foreach ($groups as $group)
            <div class="col-md-4 mb-3 mt-3">
               <div class="mb-2 ml-3 ml uppercase font-bold text-xs tracking-wider flex flex-row items-center justify-start uppercase">
                  <span class="mr-2">{{ $group->name }}</span>
                  <span id="{{ $group->id }}" class="text-red-500 cursor-pointer delete-group-button"><i class="far fa-minus-square"></i></span>
               </div>
               <div id="{{ $group->id }}" class="list bg-blue-50 border-2 border-gray-400 border-dashed rounded-md">
                  @foreach ($kanbans as $kanban)
                     @if ($kanban->group_id == $group->id)
                        <div id="{{ $kanban->task_id }}" class="flex flex-col p-2 w-full bg-white rounded shadow-sm mb-2 list-item search" draggable="true">
                           <div class="flex items-start justify-start mb-2">
                              <div class="ml-2">
                                 <div class="text-sm font-bold mb-1">{{ $kanban->tasks->name }}</div>
                                 <div class="text-xs text-gray-500">{{ $kanban->tasks->description }}</div>
                              </div>
                           </div>
                           <div class="flex flex-row items-center justify-start space-x-1">
                              <div class="flex items-center justify-start p-2 space-x-2">
                                 @switch($kanban->tasks->level)
                                    @case('small') <div class="flex-shrink-0 text-green-500"> @break
                                    @case('middle') <div class="flex-shrink-0 text-yellow-500"> @break
                                    @default <div class="flex-shrink-0 text-red-500">
                                 @endswitch
                                 {!! file_get_contents(asset('images/kanban/kanban-tag-icon.svg')) !!}
                                 </div>
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
                           <hr>
                           <div class="flex flex-row items-center justify-start space-x-11">
                              <div class="flex items-center justify-start p-2 space-x-2">
                                 <div class="flex-shrink-0 text-green-700"> {!! file_get_contents(asset('images/kanban/kanban-time-icon.svg')) !!} </div>
                                 <div class="text-sm"> {{ substr($kanban->tasks->created_at, 0, strpos($kanban->tasks->created_at, ' ' ))}} </div>
                              </div>
                              <div class="flex items-center justify-start p-2 space-x-2">
                                 <div class="flex-shrink-0 text-pink-700"> {!! file_get_contents(asset('images/kanban/kanban-time-icon.svg')) !!} </div>
                                 <div class="text-sm"> {{ substr($kanban->tasks->endpoint, 0, strpos($kanban->tasks->endpoint, ' ' ))}} </div>
                              </div>
                           </div>
                        </div>
                     @endif
                  @endforeach
               </div>
            </div>
         @endforeach
      </div>
   </div>
@endsection