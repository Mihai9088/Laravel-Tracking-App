<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.1-web/css/all.min.css') }}">
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 font-sans">

    <div class="max-w-7xl mx-auto p-4">
        <div class="bg-white shadow-md rounded my-6">
            <h1 class="text-3xl font-semibold p-6 bg-gray-50">Timesheets</h1>
            <a href="/timesheets/create" class="text-blue-500 px-6 py-2 inline-block mb-6">Create Timesheet</a>

            <div class="p-6">
                <h2 class="text-2xl font-semibold mb-6">Timesheets List</h2>

                @if(count($timeSheets) > 0)
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Project</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Task</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Data In</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Time In</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Data Out</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Time Out</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Hours worked</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Rate</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Edit</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($timeSheets as $timesheet)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $timesheet->project }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $timesheet->task }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $timesheet->date_in }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $timesheet->time_in }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $timesheet->date_out }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $timesheet->time_out }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $timesheet->hours_worked }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $timesheet->rate }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap"><a href="{{ route('timesheets.edit', $timesheet->id)}}" class="text-blue-500">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-500">There are no timesheets available.</p>
                @endif
            </div>
        </div>
    </div>

</body>
</html>
