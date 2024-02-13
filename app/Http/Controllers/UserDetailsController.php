<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserDetailsController extends Controller
{

    protected $timeSheetController;

    public function __construct(TimeSheetController $timeSheetController)
    {
        $this->timeSheetController = $timeSheetController;
    }
    public function index()
    {
        $users = User::all();
        return view('usersInfo.index', compact('users'));
    }

    public function details(User $user)
    {

        $timesheets = $this->timeSheetController->getTimeSheets($user);
        return view('usersInfo.details', compact('user', 'timesheets'));
    }
}
