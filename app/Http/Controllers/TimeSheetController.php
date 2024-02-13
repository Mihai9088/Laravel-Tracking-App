<?php

namespace App\Http\Controllers;




use App\Models\User;
use App\Models\Project;

use App\Models\TimeSheet;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Exports\timeSheetExport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\ProjectController;

class TimeSheetController extends Controller
{

    protected $projectController;


    public function getTimeSheets(User $user)
    {

        $timeSheets = TimeSheet::where('user_id',  $user->id)
            ->orderBy('date_in', 'desc')
            ->get();
        return $timeSheets;
    }

    public function __construct(ProjectController $projectController)
    {
        $this->projectController = $projectController;
    }

    public function index()
    {

        $user = auth()->user();
        $timeSheets = TimeSheet::where('user_id', $user->id)
            ->orderBy('date_in', 'desc')
            ->paginate(3);
        return view('timesheets.index', ['timeSheets' => $timeSheets]);
    }

    public function create(Request $request)
    {
        $projects = $this->projectController->getProjects();
        $taskOptions = [
            'bugFix' => 'Bug Fixing',
            'featureImplementation' => 'Feature Implementation',
            'codeRefactoring' => 'Code Refactoring',
            'unitTesting' => 'Unit Testing',
            'integrationTesting' => 'Integration Testing',
            'performanceOptimization' => 'Performance Optimization',
            'securityEnhancement' => 'Security Enhancement',
            'apiDevelopment' => 'API Development',
            'uiUxDesign' => 'UI/UX Design',
            'errorHandling' => 'Error Handling',
            'responsiveDesign' => 'Responsive Design',
            'cloudIntegration' => 'Cloud Integration',
            'codeOptimization' => 'Code Optimization',
            'dataMigration' => 'Data Migration',

        ];





        return view('timesheets.create', ['projects' => $projects, 'taskOptions' => $taskOptions]);
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
            'description' => 'nullable|string',
            'user_id' => 'exists:users,id',
        ]);

        $timeIn = Carbon::createFromFormat('Y-m-d H:i', $request->input('date_in') . ' ' . $request->input('time_in'));
        $timeOut = Carbon::createFromFormat('Y-m-d H:i', $request->input('date_out') . ' ' . $request->input('time_out'));
        $workedHours = $timeIn->diffInHours($timeOut);
        $userName = auth()->user()->name;

        $projects = $this->projectController->getProjects();
        $project = $projects->find($request->input('project'));

        $projectName =  $project->project;

        $user = auth()->user();



        $taskOptions = [
            'bugFix' => 'Bug Fixing',
            'featureImplementation' => 'Feature Implementation',
            'codeRefactoring' => 'Code Refactoring',
            'unitTesting' => 'Unit Testing',
            'integrationTesting' => 'Integration Testing',
            'performanceOptimization' => 'Performance Optimization',
            'securityEnhancement' => 'Security Enhancement',
            'apiDevelopment' => 'API Development',
            'uiUxDesign' => 'UI/UX Design',
            'errorHandling' => 'Error Handling',
            'responsiveDesign' => 'Responsive Design',
            'cloudIntegration' => 'Cloud Integration',
            'codeOptimization' => 'Code Optimization',
            'dataMigration' => 'Data Migration',

        ];

        $selectedTask = $taskOptions[$request->input('task')];




        TimeSheet::create([
            'user_id' => $user->id,
            'project' => $request->input('project'),
            'task' => $selectedTask,
            'date_in' => $request->input('date_in'),
            'time_in' => $request->input('time_in'),
            'date_out' => $request->input('date_out'),
            'time_out' => $request->input('time_out'),
            'hours_worked' => $workedHours,
            'user_name' => $userName,
            'description' => $request->input('description'),
        ]);



        return redirect('/timesheets')->with(['message' => 'Timesheet created successfully', 'taskOptions' => $taskOptions]);
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
            'description' => 'nullable|string',
        ]);

        $taskOptions = [
            'bugFix' => 'Bug Fixing',
            'featureImplementation' => 'Feature Implementation',
            'codeRefactoring' => 'Code Refactoring',
            'unitTesting' => 'Unit Testing',
            'integrationTesting' => 'Integration Testing',
            'performanceOptimization' => 'Performance Optimization',
            'securityEnhancement' => 'Security Enhancement',
            'apiDevelopment' => 'API Development',
            'uiUxDesign' => 'UI/UX Design',
            'errorHandling' => 'Error Handling',
            'responsiveDesign' => 'Responsive Design',
            'cloudIntegration' => 'Cloud Integration',
            'codeOptimization' => 'Code Optimization',
            'dataMigration' => 'Data Migration',

        ];

        $selectedTask = $taskOptions[$request->input('task')];

        $timeIn = Carbon::createFromFormat('Y-m-d H:i', $request->input('date_in') . ' ' . $request->input('time_in'));
        $timeOut = Carbon::createFromFormat('Y-m-d H:i', $request->input('date_out') . ' ' . $request->input('time_out'));
        $workedHours = $timeIn->diffInHours($timeOut);
        $userName = auth()->user()->name;

        $projects = $this->projectController->getProjects();
        $project = $projects->find($request->input('project'));

        $projectName =  $project->project;



        $timesheet->update([
            'project' => $projectName,
            'task' => $selectedTask,
            'date_in' => $request->input('date_in'),
            'time_in' => $request->input('time_in'),
            'date_out' => $request->input('date_out'),
            'time_out' => $request->input('time_out'),
            'hours_worked' => $workedHours,
            'user_name' => $userName,
            'description' => $request->input('description'),
        ]);

        return redirect('/timesheets')->with('message', 'Timesheet updated successfully');
    }

    public function edit(TimeSheet $timesheet)
    {
        $projects = $this->projectController->getProjects();
        $taskOptions = [
            'bugFix' => 'Bug Fixing',
            'featureImplementation' => 'Feature Implementation',
            'codeRefactoring' => 'Code Refactoring',
            'unitTesting' => 'Unit Testing',
            'integrationTesting' => 'Integration Testing',
            'performanceOptimization' => 'Performance Optimization',
            'securityEnhancement' => 'Security Enhancement',
            'apiDevelopment' => 'API Development',
            'uiUxDesign' => 'UI/UX Design',
            'errorHandling' => 'Error Handling',
            'responsiveDesign' => 'Responsive Design',
            'cloudIntegration' => 'Cloud Integration',
            'codeOptimization' => 'Code Optimization',
            'dataMigration' => 'Data Migration',

        ];

        return view('timesheets.edit', ['timesheet' => $timesheet, 'projects' => $projects, 'taskOptions' => $taskOptions]);
    }

    public function destroy(TimeSheet $timesheet)
    {
        $timesheet->delete();
        return redirect('/timesheets')->with('message', 'timesheet deleted successfully');
    }

    public function deleteSelected(Request $request)
    {
        TimeSheet::whereIn('id',  $request->input('timesheet'))->delete();
        return redirect('/timesheets')->with('message', 'timesheets deleted successfully');
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
}
