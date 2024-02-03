<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.1-web/css/all.min.css') }}">
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>

<div class="max-w-md mx-auto mt-10 bg-white p-8 border border-gray-300 rounded">
    <h1 class="text-2xl font-semibold mb-6">Edit Project</h1>

    <form action="{{route('projects.update', ['project' => $project])}}" method="POST">
        @csrf
        @method('PUT')  
        <div class="mb-4">
            <label for="project" class="block text-sm font-medium text-gray-700 mb-1">Proiect</label>
            <input type="text" name="project" class="form-input w-full bg-gray-100 border border-gray-300 p-2 rounded" value="{{ old('project', $project->project) }}" placeholder="Enter project name">
            @error('project')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <button type="submit" class="bg-[#020617] text-white rounded py-2 px-4 hover:bg-[#1f2937]">Edit Project</button>
        </div>

    </form>
</div>

</body>
</html>
