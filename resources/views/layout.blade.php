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

    
    

    <footer>
        @include('footer')
    </footer>
    </body>
</html>
