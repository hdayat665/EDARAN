<?php

namespace App\Imports;

use App\Models\LeaveHolidays;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EleaveHolidaysImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $result = new LeaveHolidays([
            'tenant_id'  => Auth::user()->tenant_id,
            'holiday_title'  => $row['holiday_title'],
            'start_date' => $row['start_date'],
            'end_date'    => $row['end_date'],
            'annual_date'    => $row['annual_date'],
        ]);

        LeaveHolidays::where('holiday_title', $row['holiday_title'])->delete();

        return $result;
    }
}