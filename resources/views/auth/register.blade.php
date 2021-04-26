@extends('layouts.app')

@section('content')
<div class="bg-white font-family-karla h-screen">
    <div class="w-full flex flex-wrap">
        <div class="w-full md:w-1/2 flex flex-col">
            <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-24">
                <img class="p-4 h-32 w-32" src="{{ asset('favicon.svg') }}">
            </div>
            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-center text-3xl">Регистрация.</p>
                <form method="POST" action="{{ route('register') }}" class="flex flex-col pt-3 md:pt-8">
                    @csrf
                    <div class="flex flex-col pt-4">
                        <label for="name" class="text-lg">{{ __('Логин') }}</label>
                        <div class="register-name-box">
                            <input id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus type="text"
                            class="@error('name') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                            @error('name')
                                <span role="alert" class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col pt-4">
                        <label for="email" class="text-lg">{{ __('Электронная почта') }}</label>
                        <div class="register-email-box">
                            <input id="email" name="email" value="{{ old('email') }}" required autocomplete="email" type="email"
                            class="@error('email') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                            @error('email')
                                <span role="alert" class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col pt-4">
                        <label for="password" class="text-lg">{{ __('Пароль') }}</label>
                        <div class="register-password-box">
                            <input id="password" name="password" required autocomplete="new-password" type="password"
                            class="@error('password') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                            @error('password')
                                <span role="alert" class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col pt-4">
                        <label for="password-confirm" class="text-lg">{{ __('Подтверждение пароля')}}</label>
                        <div class="register-password-confirm-box">
                            <input id="password-confirm" name="password-confirm" required autocomplete="new-password" type="password"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                    </div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 mt-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Зарегистрироваться') }}
                    </button>
                </form>
                <div class="text-center pt-12 pb-12">
                    <p>У вас уже есть аккаунт? <a href="login.html" class="underline font-semibold">Авторизуйтесь.</a></p>
                </div>
            </div>
        </div>
        <div class="w-1/2 shadow-2xl">
            <div class="object-cover w-full h-screen hidden md:block additional-garadient"></div>
        </div>
    </div>
</div>
@endsection