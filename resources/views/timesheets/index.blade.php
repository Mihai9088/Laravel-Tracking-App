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
    <x-flashMessages />
    <div class="max-w-8xl mx-auto p-4">
        <div class="bg-white shadow-md rounded my-6">
            <div class="p-6 bg-gray-50">
                <h1 class="text-3xl font-semibold mb-4">Timesheets</h1>
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0 md:space-x-4">
                    <div class="flex items-center space-x-4">
                        <form action="{{ route('timesheets.deleteSelected') }}" method="post">
                            @csrf
                            <input type="submit" class="bg-[#020617] hover:bg-[#1f2937] text-white px-6 py-2 rounded-md" value="Delete Users">
                        </form>
                        
                        <a href="/timesheets/create"
                            class="bg-[#020617] hover:bg-[#1f2937] text-white px-6 py-2 rounded-md  ">Create
                            Timesheet</a>
                        <a href="{{ route('timesheets.export.csv') }}"
                            class="bg-[#020617] hover:bg-[#1f2937] text-white py-2 px-4 rounded">Export CSV</a>
                    </div>
                    <div class="flex items-center space-y-4 md:space-y-0 md:space-x-4">
                        <label for="date_filter"
                            class="block text-sm font-medium text-gray-700">Filter by date</label>
                        <form action="{{ route('timesheets.filter') }}" method="get"
                            class="flex items-center space-y-4 md:space-y-0 md:space-x-4">
                           @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                                <div>
                                    <select name="date_filter"
                                        class="form-select bg-gray-100 border border-gray-300 p-2 rounded">
                                        <option value="">All Dates</option>
                                        <option value="today">Today</option>
                                        <option value="yesterday">Yesterday</option>
                                        <option value="this-week">This Week</option>
                                        <option value="last-week">Last Week</option>
                                        <option value="this-month">This Month</option>
                                        <option value="last-month">Last Month</option>
                                        <option value="this-year">This Year</option>
                                        <option value="last-year">Last Year</option>
                                    </select>
                                </div>
                                <button type="submit"
                                    class="bg-[#020617] hover:bg-[#1f2937] text-white p-2 rounded">Filter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="p-6 overflow-x-auto">
                <h2 class="text-2xl font-semibold mb-6">Timesheets List</h2>
                @if(count($timeSheets) > 0)
                <div class="overflow-x-auto">
                    <table
                        class="min-w-full sm:border-collapse sm:border-gray-200 divide-y divide-gray-200 overflow-hidden sm:rounded-lg">
                        <thead class="bg-gray-50">
                            <tr>
                                <th></th>
                              
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Project</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Task</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date In</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Time In</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date Out</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Time Out</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Hours worked</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    User Name</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Description</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Edit</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Delete</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($timeSheets as $timesheet)
                            <tr>
                               
                                <td>
                                    <input type="checkbox" name="ids[{{$timesheet->id}}]" class="ml-2" value="{{ $timesheet->id }}">
                                </td>
                              
                                
                               

                                <td class="px-6 py-4 whitespace-nowrap">{{ $timesheet->project }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $timesheet->task }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $timesheet->date_in }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $timesheet->time_in }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $timesheet->date_out }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $timesheet->time_out }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $timesheet->hours_worked }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $timesheet->user_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $timesheet->description }}</td>
                                <td class="px-6 py-4 whitespace-nowrap"><a
                                        href="{{ route('timesheets.edit', $timesheet->id)}}" class="text-blue-500">Edit</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form action="{{ route('timesheets.destroy', $timesheet->id) }}" method="post">
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
                {{ $timeSheets->links() }}
                @else
                <p class="text-gray-500">There are no timesheets available.</p>
                @endif
            </div>
        </div>
    </div>
    @include('footer')


    

</body>

</html>
