<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
