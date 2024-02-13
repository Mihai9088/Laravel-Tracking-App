<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.1-web/css/all.min.css') }}">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>


<body class="bg-gray-100 font-sans">
    @include('navbar')

    <div class="max-w-7xl mx-auto p-4">
        <div class="bg-white shadow-md rounded my-6">
            <div class="p-6 bg-gray-50">
                <h1 class="text-3xl font-semibold mb-4">Timesheets for {{ $user->name }}</h1>
            </div>
            <div class="p-6 overflow-x-auto">
                @if(count($timesheets) > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full sm:border-collapse sm:border-gray-200 divide-y divide-gray-200 overflow-hidden sm:rounded-lg">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Project
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Task
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date In
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Time In
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date Out
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Time Out
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Hours worked
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        User Name
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Description
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($timesheets as $timesheet)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $timesheet->project }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $timesheet->task }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $timesheet->date_in }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $timesheet->time_in }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $timesheet->date_out }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $timesheet->time_out }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $timesheet->hours_worked }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $timesheet->user_name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $timesheet->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $timesheets->links() }} <!-- Adaugă link-urile de paginare -->
                    </div>
                @else
                    <p class="text-gray-500">There are no timesheets available for {{ $user->name }}.</p>
                @endif
            </div>
        </div>
        @include('footer')
    </div>

</body>

</html>