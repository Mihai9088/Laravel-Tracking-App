<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function read()
    {
        $projects = DB::table('projects')->get();
    }
}
