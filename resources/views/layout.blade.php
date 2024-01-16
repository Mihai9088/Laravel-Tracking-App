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

    @yield('content')
    <div class="flex items-center justify-center h-screen w-screen">
        <div class="  text-black p-4">
            <h1 class="text-3xl font-bold mb-2">Welcome to the Home Page!</h1>
            <p class="mb-4">Please login or register to use our features.</p>
        </div>
    </div>
    

    <footer>
        @include('footer')
    </footer>
    </body>
</html>
