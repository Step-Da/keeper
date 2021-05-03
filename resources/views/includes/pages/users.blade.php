@extends('layouts.account')

@section('account-site-title', 'Keeper - аккаунт ('. Auth::user()->name .')')

@section('content')
<div class="widget w-full p-4 mb-4 rounded-lg bg-white shadow-sm border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
    <div class="flex flex-row items-center justify-between mb-6">
        <div class="flex flex-col">
            <div class="text-sm font-light text-gray-500">Пользователи</div>
            <div class="text-sm font-bold"><span><code>Сотрудники</code>&#44; которые зарегистрированы в системе</span></div>
        </div>
    </div>
    <table class="table no-border striped">
        <thead>
            <tr>
                <th>&#35;</th>
                <th>Электронная почта/логин</th>
                <th>Имя</th>
                <th>Роль</th>
                <th>Регистрация</th>
                <th>Функции</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->email}}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        <button value="{{$user->id}}" class="delete-user-target">
                            <img class="w-5 h-5 cursor-pointer " src="{{ asset('images/account/cancel.svg') }}">
                        </button> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection