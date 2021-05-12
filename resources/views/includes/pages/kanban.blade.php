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
                     <div id="{{ $kanban->task_id }}" class="list-item" draggable="true">{{ $kanban->tasks->name }}</div>
                  @endif
               @endforeach
            </div>
         @endforeach
      </div>
   </div>
@endsection