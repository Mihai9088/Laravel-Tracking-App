<?php

namespace App\Http\Controllers;




use App\Models\TimeSheet;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Exports\timeSheetExport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class TimeSheetController extends Controller
{

    public function index()
    {
        $timeSheets = TimeSheet::paginate(3);
        return view('timesheets.index', ['timeSheets' => $timeSheets]);
    }

    public function create()
    {
        return view('timesheets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'project' => 'required|string',
            'task' => 'required|string',
            'date_in' => 'required|date',
            'time_in' => 'required|string',
            'date_out' => 'required|date|after_or_equal:date_in',
            'time_out' => 'required|string',
            'rate' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $timeIn = Carbon::createFromFormat('H:i', $request->input('time_in'));
        $timeOut = Carbon::createFromFormat('H:i', $request->input('time_out'));

        $workedHours = $timeIn->diffInHours($timeOut);

        TimeSheet::create([
            'project' => $request->input('project'),
            'task' => $request->input('task'),
            'date_in' => $request->input('date_in'),
            'time_in' => $request->input('time_in'),
            'date_out' => $request->input('date_out'),
            'time_out' => $request->input('time_out'),
            'hours_worked' => $workedHours,
            'rate' => $request->input('rate'),
            'description' => $request->input('description'),
        ]);

        return redirect('/timesheets')->with('message', 'Timesheet created successfully');
    }

    public function update(TimeSheet $timesheet, Request $request)
    {
        $request->validate([
            'project' => 'required|string',
            'task' => 'required|string',
            'date_in' => 'required|date',
            'time_in' => 'required|string',
            'date_out' => 'required|date',
            'time_out' => 'required|string',
            'rate' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $timeIn = Carbon::createFromFormat('H:i', $request->input('time_in'));
        $timeOut = Carbon::createFromFormat('H:i', $request->input('time_out'));

        $workedHours = $timeIn->diffInHours($timeOut);

        $timesheet->update([
            'project' => $request->input('project'),
            'task' => $request->input('task'),
            'date_in' => $request->input('date_in'),
            'time_in' => $request->input('time_in'),
            'date_out' => $request->input('date_out'),
            'time_out' => $request->input('time_out'),
            'hours_worked' => $workedHours,
            'rate' => $request->input('rate'),
            'description' => $request->input('description'),
        ]);

        return redirect('/timesheets')->with('message', 'Timesheet updated successfully');
    }

    public function edit(TimeSheet $timesheet)
    {
        return view('timesheets.edit', ['timesheet' => $timesheet]);
    }

    public function destroy(TimeSheet $timesheet)
    {
        $timesheet->delete();
        return redirect('/timesheets')->with('message', 'timesheet deleted successfully');
    }



    public function filter(Request $request)
    {

        $query = TimeSheet::query();
        $date = $request->date_filter;

        switch ($date) {
            case "today":
                $query->whereDate('date_in', Carbon::today());
                break;

            case "yesterday":
                $query->whereDate('date_in', Carbon::yesterday());
                break;

            case "this-week":
                $query->whereBetween('date_in', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;

            case "last-week":
                $query->whereBetween('date_in', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]);
                break;

            case "this-month":
                $query->whereMonth('date_in', Carbon::now()->month);
                break;

            case "last-month":
                $query->whereMonth('date_in', Carbon::now()->subMonth()->month);
                break;

            case "this-year":
                $query->whereYear('date_in', Carbon::now()->year);
                break;

            case "last-year":
                $query->whereYear('date_in', Carbon::now()->subYear()->year);
                break;
        }

        return  view('timesheets.index', ['timeSheets' => $query->paginate(3)]);
    }
    public function exportToCsv()
    {
        return Excel::download(new timeSheetExport(), 'timesheet.csv');
    }


    public function workedHours(Request $request)
    {
        $timeIn = Carbon::createFromFormat('H:i', $request->input('time_in'));
        $timeOut = Carbon::createFromFormat('H:i', $request->input('time_out'));

        $workedHours = $timeIn->diffInHours($timeOut);
    }
}
