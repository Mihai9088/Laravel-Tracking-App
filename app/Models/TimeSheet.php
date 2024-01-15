<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TimeSheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'project',
        'task',
        'date_in',
        'time_in',
        'date_out',
        'time_out',
        'hours_worked',
        'rate',
        'description',
    ];

    public static function getAllTimeSheets()
    {
        $result = DB::table('time_sheets')
            ->select('id', 'project', 'task', 'date_in', 'time_in', 'date_out', 'time_out', 'hours_worked', 'rate', 'description')
            ->get()->toArray();
        return $result;
    }
}
