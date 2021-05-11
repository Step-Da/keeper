@extends('layouts.account')

@section('account-site-title', 'Keeper - аккаунт ('. Auth::user()->name .')')

@section('content')
   @include('includes.widgets.kanbanbar')
   <div class="kanban-board">
      <div id="group-lists" class="lists">
         <div class="list" id="first">
            <div id="1" class="list-item" draggable="true">List item 1</div>
            <div id="2" class="list-item" draggable="true">List item 2</div>
            <div id="3" class="list-item" draggable="true">List item 3</div>
         </div>
         @foreach ($groups as $group)
            <div class="list" id="{{ $group->id }}">

            </div>
         @endforeach
      </div>
   </div>
@endsection