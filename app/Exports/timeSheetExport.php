<?php

namespace App\Exports;

use App\Models\TimeSheet;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

class timeSheetExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return collect(TimeSheet::getAllTimeSheets());
    }

    public function headings(): array
    {
        return [
            'id',
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
    }
}
