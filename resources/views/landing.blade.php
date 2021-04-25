<!DOCTYPE html>
<html lang="en">
  <head>
    {{-- Meta --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <title>Kepper</title> 
    {{-- Link --}}
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ URL::asset('favicon.svg') }}" type="image/x-icon"/> 
    {{-- Script --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
  </head> 
  <body class="leading-normal tracking-normal text-white landing-gradient">
    {{-- Navbar --}}
    <nav id="landing-header" class="fixed w-full z-30 top-0 text-white">
      <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
        <div class="pl-4 flex items-center">
          <a id="landing-header-text" class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
            <img class="h-11 fill-current inline" src="{{ asset('favicon.svg') }}">
            KEEPER
          </a>
        </div>
        <div class="block lg:hidden pr-4">
        </div>
      </div>
      <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>
    {{-- 1 Level --}}
    <div class="pt-24">
      <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <!--Left Col-->
        <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-left md:text-left">
          <h1 class="my-4 text-5xl font-bold leading-tight">
            Keeper управление программными проектами
          </h1>
          <p class="leading-normal text-2xl mb-8">
            Удобное решения для управления проектами!
          </p>
          <button class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            Начать!
          </button>
        </div>
        <!--Right Col-->
        <div class="w-full md:w-3/5 py-5 text-center">
          <img class="w-full md:w-4/5 z-50 " src="{{ asset('images/landing/landing-main-image.svg') }}" />
        </div>
      </div>
    </div>
    <div class="relative -mt-12 lg:-mt-19">
      <img src="{{ asset('images/landing/landing-top-pattern.svg') }}">
    </div>
    {{-- 2 Level --}}
    <section class="bg-white border-b py-8">
      <div class="container max-w-5xl mx-auto m-8">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-600">
          О нас
        </h1>
        <div class="w-full mb-4">
          <div class="h-1 mx-auto landing-gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <div class="flex flex-wrap">
          <div class="w-5/6 sm:w-1/2 p-6">
            <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
              Задачи и их решения
            </h3>
            <p class="text-gray-600 mb-8">
              Выполнение поставленных проектных задач 
              в реальном времени 
              <br />
              <br />
              {{-- Images from:
              <a class="text-pink-500 underline" href="https://undraw.co/">undraw.co</a> --}}
            </p>
          </div>
          <div class="w-full sm:w-1/2 p-6">
            <img class="w-full sm:h-64 mx-auto" viewBox="0 0 1177 598.5" src="{{ asset('images/landing/landing-second-image.svg') }}">
          </div>
        </div>
        <div class="flex flex-wrap flex-col-reverse sm:flex-row">
          <div class="w-full sm:w-1/2 p-6 mt-6">
            <img class="w-5/6 sm:h-64 mx-auto" viewBox="0 0 1176.60617 873.97852" src="{{ asset('images/landing/landing-first-image.svg')}}">
          </div>
          <div class="w-full sm:w-1/2 p-6 mt-6">
            <div class="align-middle">
              <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                Менеджмент проектов
              </h3>
              <p class="text-gray-600 mb-8">
                Управляй процессом выполнения поставленных задач в реальном времени без затрат больших ресурсов.
                <br />
                <br />
                {{-- Images from:
                <a class="text-pink-500 underline" href="https://undraw.co/">undraw.co</a> --}}
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <img src="{{ asset('images/landing/landing-lower-pattern.svg')}}">
    <section class="container mx-auto text-center py-6 mb-12">
      <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-white">
       Используй Keeper
      </h1>
      <div class="w-full mb-4">
        <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
      </div>
      <h3 class="my-4 text-3xl leading-tight">
        Для начала работы с Keeper создайте аккаунт 
      </h3>
      <button class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
        Начать!
      </button>
    </section>
  </body>
</html>