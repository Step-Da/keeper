@extends('layouts.account')

@section('account-site-title', 'Keeper - аккаунт ('. Auth::user()->name .')')

@section('content')
   <div class="app">
      <div class="lists">
         <div class="list" id="first">
            <div id="1" class="list-item" draggable="true">List item 1</div>
            <div id="2" class="list-item" draggable="true">List item 2</div>
            <div id="3" class="list-item" draggable="true">List item 3</div>
         </div>
         <div class="list" id="second"></div>
         <div class="list" id="th"></div>
      </div>
   </div>
@endsection