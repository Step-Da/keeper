@extends('layouts.account')

@section('account-site-title', 'Keeper - аккаунт ('. Auth::user()->name .')')

@section('content')
   @include('includes.widgets.linerbar')
   @foreach ($project as $element)
      <div class="container project-library search">
         <div class="mb-4">
            <div class="card-project bg-white rounded-r-2xl rounded-lg shadow-2xl flex max-w-full m-1 overflow-hidden">
               <div class=" card-preview text-white max-w-sm">
                  <h6 class="text-white">Наименование</h6>
                  <h2 class="text-gray-900">{{ $element->name }}</h2>
                  <a href="{{ route('account-kanban-page', ['id' => $element->id]) }}" class="text-gray-900">
                     Просмотреть все задачи <i class="fas fa-chevron-right"></i>
                  </a>
               </div>
               <div class="relative w-full p-7">
                  <div class="progress-bar-container absolute text-right">
                     <div class="progress-bar-line bg-gray-200 rounded-sm w-full h-1.5"></div>
                     <span class="text-sm opacity-60 tracking-wide">10/5 процесс этапов </span>
                  </div>
                  <h6>Описание</h6>
                  <h2>{{ $element->description }}</h2>
               </div>
            </div>
         </div>
      </div>
   @endforeach
@endsection