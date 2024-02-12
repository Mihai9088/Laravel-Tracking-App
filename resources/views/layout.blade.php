<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

       <link rel="stylesheet" href="{{asset('fontawesome-free-6.5.1-web\css\all.min.css')}}">
        @vite('resources/css/app.css')
        <script src="//unpkg.com/alpinejs" defer></script>
       

    </head>
    
    <body >
        @include('navbar')
  
    <x-flashMessages />

    
    <div  style="background: linear-gradient(rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.75)), url('{{ asset('images/time.jpg') }}'); background-size: cover;" class="h-screen flex items-center justify-center"> 
       

        <div class="text-white w-[100%] absolute top-1/2  -translate-y-1/2 text-center">
            <h1 class="text-3xl mt-[80px] mb-2">Start Tracking Your Time</h1>
            <p class ="text-xl leading-8 ">Get started today by starting to work on a new project.</p>
        </div>

    </div>
    

   
    </body>
</html>
