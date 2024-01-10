<?php

namespace App\Http\Controllers;

use App\Models\TimeSheet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimeSheetController extends Controller
{

    public function index()
    {
        $timeSheets = TimeSheet::all();
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
            'date_out' => 'required|date',
            'time_out' => 'required|string',
            'hours_worked' => 'required|numeric',
            'rate' => 'required|numeric',
        ]);


        TimeSheet::create([
            'project' => $request->input('project'),
            'task' => $request->input('task'),
            'date_in' => $request->input('date_in'),
            'time_in' => $request->input('time_in'),
            'date_out' => $request->input('date_out'),
            'time_out' => $request->input('time_out'),
            'hours_worked' => $request->input('hours_worked'),
            'rate' => $request->input('rate'),
        ]);
        return redirect('/timesheets')->with('message', 'timesheet created successfully');
    }

    public function edit(TimeSheet $timesheet)
    {
        return view('timesheets.edit', ['timesheet' => $timesheet]);
    }
}
