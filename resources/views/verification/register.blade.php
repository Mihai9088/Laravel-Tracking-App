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
        <x-flashMessages />

        <div class="container mx-auto p-8">
            <div class="bg-white max-w-md mx-auto p-8 rounded shadow-md">
                <img src="{{ url('/images/logo.png') }}" alt="Logo" class="mx-auto mb-4">
                <h1 class="text-2xl font-semibold mb-4">Register Here</h1>
                <p class="text-gray-700">
                    Thanks for registering! Please check your email click the button below to complete your registration:
                </p>
                <a href="http://127.0.0.1:8000/" style="color: #ffffff;" class="mt-2 mb-2 inline-block bg-[#020617] hover:bg-[#1f2937] text-white px-6 py-2 rounded">
                    Register
                </a>

                <p class="mt-4 text-gray-700">
                    Thanks for choosing {{ config('app.name') }}!
                </p>
            </div>
        </div>
    </div>
    
    
     
   
    </body>
</html>
