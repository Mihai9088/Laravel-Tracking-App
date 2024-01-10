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
    <h1 class="text-2xl font-semibold mb-6">Edit new Timesheet</h1>

    <form action="/timesheets/{{ $timesheet->id }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="project" class="block text-sm font-medium text-gray-700 mb-1">Proiect</label>
            <select name="project" class="form-select w-full bg-gray-100 border border-gray-300 p-2 rounded">
                <option value="proiect1" {{ old('project', $timesheet->project) === 'proiect1' ? 'selected' : '' }}>Project 1</option>
                <option value="proiect2" {{ old('project', $timesheet->project) === 'proiect2' ? 'selected' : '' }}>Project 2</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="task" class="block text-sm font-medium text-gray-700 mb-1">Task</label>
            <select name="task" class="form-select w-full bg-gray-100 border border-gray-300 p-2 rounded">
                <option value="task1" {{ old('task', $timesheet->task) === 'task1' ? 'selected' : '' }}>Task 1</option>
                <option value="task2" {{ old('task', $timesheet->task) === 'task2' ? 'selected' : '' }}>Task 2</option>
                
            </select>
        </div>

        <div class="mb-4 flex">
            <div class="mr-2 w-1/2">
                <label for="date_in" class="block text-sm font-medium text-gray-700 mb-1">Data In</label>
                <input type="date" class="form-input w-full bg-gray-100 border-b-2 border-gray-300 p-2 rounded" name="date_in" value="{{$timesheet->date_in}}" />
                @error('date_in')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-1/2">
                <label for="time_in" class="block text-sm font-medium text-gray-700 mb-1">Time In</label>
                <input type="text" class="form-input w-full bg-gray-100 border-b-2 border-gray-300 p-2 rounded" name="time_in" value="{{ $timesheet->time_in }}" />
                @error('time_in')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-4 flex">
            <div class="mr-2 w-1/2">
                <label for="date_out" class="block text-sm font-medium text-gray-700 mb-1">Data Out</label>
                <input type="date" class="form-input w-full bg-gray-100 border-b-2 border-gray-300 p-2 rounded" name="date_out" value="{{ $timesheet->date_out }}" />
                @error('date_out')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-1/2">
                <label for="time_out" class="block text-sm font-medium text-gray-700 mb-1">Time Out</label>
                <input type="text" class="form-input w-full bg-gray-100 border-b-2 border-gray-300 p-2 rounded" name="time_out" value="{{$timesheet->time_out }}" />
                @error('time_out')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="hours_worked" class="block text-sm font-medium text-gray-700 mb-1">Ore Lucrate</label>
            <input type="number" class="form-input w-full bg-gray-100 border border-gray-300 p-2 rounded" name="hours_worked" value="{{ $timesheet->hours_worked }}" />
            @error('hours_worked')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="rate" class="block text-sm font-medium text-gray-700 mb-1">Rate (hour by hour)</label>
            <input type="number" class="form-input w-full bg-gray-100 border border-gray-300 p-2 rounded" name="rate" value="{{ $timesheet->rate }}" />
            @error('rate')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <button type="submit" class="bg-[#020617] text-white rounded py-2 px-4 hover:bg-[#1f2937]">Edit Timesheet</button>
        </div>
    </form>
</div>

</body>
</html>
