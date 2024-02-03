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
    <h1 class="text-2xl font-semibold mb-6">Edit  Timesheet</h1>

    <form action="{{route('timesheets.update', ['timesheet' => $timesheet])}}" method="POST">
        @csrf
        @method('PUT')  
        <div class="mb-4">
            <label for="project" class="block text-sm font-medium text-gray-700 mb-1">Proiect</label>
            <select name="project" class="form-select w-full bg-gray-100 border border-gray-300 p-2 rounded">
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}" {{ old('project', $timesheet->project) == $project->id ? 'selected' : '' }}>{{ $project->project }}</option>
                @endforeach
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
                <input type="time" class="form-input w-full bg-gray-100 border-b-2 border-gray-300 p-2 rounded" name="time_in" value="{{ $timesheet->time_in }}" />
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
                <input type="time" class="form-input w-full bg-gray-100 border-b-2 border-gray-300 p-2 rounded" name="time_out" value="{{$timesheet->time_out }}" />
                @error('time_out')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="hours_worked" class="block text-sm font-medium text-gray-700 mb-1">Hours Worked</label>
            <input type="number" class="form-input w-full bg-gray-100 border border-gray-300 p-2 rounded" name="hours_worked" value="{{ old('hours_worked', $timesheet->hours_worked) }}" readonly />
            @error('hours_worked')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea class="form-input w-full bg-gray-100 border border-gray-300 p-2 rounded" name="description"  >{{ $timesheet->description }}</textarea>
            @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="user_name" class="block text-sm font-medium text-gray-700 mb-1">User Name</label>
            <input type="text" class="form-input w-full bg-gray-100 border border-gray-300 p-2 rounded" name="user_name" value="{{ $timesheet->user_name }}"  readonly/>
            @error('user_name')
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
