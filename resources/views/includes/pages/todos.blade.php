@extends('layouts.account')

@section('account-site-title', 'Keeper - аккаунт ('. Auth::user()->name .')')

@section('content')
<input id="mirror-user-id" class="hidden" value="{{ Auth()->user()->id}}">
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="border p-3 mb-25 bg-gray-50 rounded shadow">
            <div class="card-body">
               <form action="javascript:void(0);">
                  <input type="text" class="form-control add-task" placeholder="Новая общая задача ...">
               </form>
               <ul class="nav nav-pills todo-nav mt-1">
                  <li role="presentation" class="nav-item all-task active"><a class="nav-link cursor-pointer">Все задачи</a></li>
                  <li role="presentation" class="nav-item active-task"><a class="nav-link cursor-pointer">Активные задачи</a></li>
                  <li role="presentation" class="nav-item completed-task"><a class="nav-link cursor-pointer">Выполненые задачи</a></li>
               </ul>
               <div class="todo-list my-2.5"> 
                  @foreach ($data as $todo)
                     @if ($todo->status) <div class="todo-item p-3.5 my-1.5 rounded-sm bg-indigo-100 complete">
                     @else <div class="todo-item p-3.5 my-1.5 rounded-sm bg-indigo-100"> @endif
                        <div class="checker"><span class=""><input type="checkbox" value="{{ $todo->id }}" @if($todo->status) checked @endif></span></div>
                        <span>{{ $todo->name }}</span>
                        <a href="javascript:void(0);" class="float-right remove-todo-item"><i class="icon-close"></i></a>
                     </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection