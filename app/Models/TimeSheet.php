<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TimeSheet extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id',
        'project',
        'task',
        'date_in',
        'time_in',
        'date_out',
        'time_out',
        'hours_worked',
        'user_name',
        'description',
    ];

    public static function getAllTimeSheets()
    {
        $result = DB::table('time_sheets')
            ->select('id', 'project', 'task', 'date_in', 'time_in', 'date_out', 'time_out', 'hours_worked', 'user_name', 'description')
            ->get()->toArray();
        return $result;
    }
}
