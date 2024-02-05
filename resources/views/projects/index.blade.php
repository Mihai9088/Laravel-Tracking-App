<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.1-web/css/all.min.css') }}">
    @vite('resources/css/app.css') 
    @vite('resources/js/app.js')
    <script src="//unpkg.com/alpinejs" defer="defer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gray-100 font-sans">
    @include('navbar')
    <x-flashmessages />

    <div class="max-w-7xl mx-auto p-4">
        <div class="bg-white shadow-md rounded my-6">
            <div class="p-6 bg-gray-50">
                <h1 class="text-3xl font-semibold mb-4">Projects</h1>
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0 md:space-x-4">
                    <div class="flex items-center space-x-4">
                        <a href="/projects/create" class="bg-[#020617] hover:bg-[#1f2937] text-white px-6 py-2 rounded-md">
                            Create Project
                        </a>
                    </div>
                </div>
            </div>
            <div class="p-6 overflow-x-auto">
                <h2 class="text-2xl font-semibold mb-6">Projects List</h2>
                @if(count($projects) > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full sm:border-collapse sm:border-gray-200 divide-y divide-gray-200 overflow-hidden sm:rounded-lg">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Project
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Edit
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Delete
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($projects as $project)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $project->project }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('projects.edit', $project->id)}}" class="text-blue-500">Edit</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-red-500 hover:cursor-pointer">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $projects->links() }}
                @else
                <p class="text-gray-500">There are no projects available.</p>
                @endif
            </div>
        </div>
        @include('footer')
    </div>
</body>

</html>
