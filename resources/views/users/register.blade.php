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

    <main  class="  my-10">
        <div class="mx-4">
            <div
                class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-10"
            >
                <header class="text-center">
                    <h2 class="text-2xl font-bold uppercase mb-1">
                        Register
                    </h2>
                    <p class="mb-4">Create an account to use our features</p>
                </header>

                <form action="/users" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="inline-block text-lg mb-2">
                            Name
                        </label>
                        <input
                            type="text"
                            class="border border-gray-200 rounded p-2 w-full"
                            name="name"
                            value="{{ old('name') }}"
                        />
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email"   class="inline-block text-lg mb-2 "
                            >Email</label
                        >
                        <input
                            type="email"
                            class="border border-gray-200 rounded p-2 w-full"
                            name="email"
                            value="{{ old('email') }}"
                        />
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    </div>

                    <div class="mb-4">
                        <label
                            for="password"
                            class="inline-block text-lg mb-2"
                        >
                            Password
                        </label>
                        <input
                            type="password"
                            class="border border-gray-200 rounded p-2 w-full"
                            name="password"
                      
                        />
                        @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    </div>

                    <div class="mb-4">
                        <label
                            for="password_confirmation"
                            class="inline-block text-lg mb-2"
                        >
                            Confirm Password
                        </label>
                        <input
                            type="password"
                            class="border border-gray-200 rounded p-2 w-full"
                            name="password_confirmation"
                      
                        />
                        @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    </div>

                    <div class="mb-4">
                        <button
                            type="submit"
                            class="bg-[#020617] text-white rounded py-2 px-4 hover:bg-[#1f2937]"
                        >
                            Sign Up
                        </button>
                    </div>

                    <div class="mt-[10px]">
                        <p>
                            Already have an account?
                            <a href="/login" class="text-laravel text-blue-500 "
                                >Login</a
                            >
                        </p>
                    </div>
                </form>
            </div>
        </div>

        @include('footer')
    </main>

    

