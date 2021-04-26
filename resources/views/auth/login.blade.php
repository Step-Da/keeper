@extends('layouts.app')

@section('app-site-title', 'Авторизация в Keeper')

@section('content')
<div class="bg-white font-family-karla ">
    <div class=" flex flex-wrap">
        <div class=" md:w-1/2 flex flex-col">
            <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-24">
                <a href="{{ route('landing-page') }}"><img class="p-4 h-32 w-32" src="{{ asset('favicon.svg') }}"></a>
            </div>
            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-center text-3xl">Авторизация.</p>
                <form method="POST" action="{{ route('login') }}" class="flex flex-col pt-3 md:pt-8">
                    @csrf
                    <div class="flex flex-col pt-4">
                        <label class="text-lg" for="email">{{ __('Электронная почта') }}</label>
                        <div class="login-email-box">
                            <input id="email" type="email" name="email" value="{{ old('email')}}" required autocomplete="email" autofocus  
                            class="@error('email') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" placeholder="Введите электронную почту">
                            @error('email')
                                <span role="alert" class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col pt-4">
                        <label class="text-lg" for="password">{{ __('Пароль') }}</label>
                        <div class="login-password-box">
                            <input id="password" type="password" name="email" required autocomplete="current-password" 
                            class="@error('password') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" placeholder="Введите пароль">
                            @error('password')
                                <span role="alert" class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col pt-4">
                        <div class="form-check">
                            <input class="checked:bg-blue-600 checked:border-transparent" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label text-lg" for="remember">
                                {{ __('Запомнить данные') }}
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 mt-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                          <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                          </svg>
                        </span>
                        {{ __('Авторизироваться') }}
                    </button>
                </form>
                <div class="text-center pt-12 pb-12">
                    <p>Есть ли у вас учетная запись? <a href="{{ route('register-page') }}" class="underline font-semibold">Зарегистрируйтесь.</a></p>
                </div>
            </div>
        </div>
        <div class="w-1/2 shadow-2xl">
            <div class="object-cover w-full h-screen hidden md:block additional-garadient"></div>
        </div>
    </div>
</div>
@endsection