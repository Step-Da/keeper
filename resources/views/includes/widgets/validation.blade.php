@if($errors->any())
   <div class="bg-red-50 p-4 rounded flex text-red-600 mb-2">
      <div class="text-lg">
         {!! file_get_contents(asset('images/account/danger-alert.svg')) !!}
      </div>
      <div class=" px-3">
         <h3 class="text-red-800 font-semibold tracking-wider">{{ __('Ошибки валидации данных') }}</h3>
         <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
         </ul>
      </div>
   </div>
@endif