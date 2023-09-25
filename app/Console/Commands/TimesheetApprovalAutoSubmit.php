<?php

namespace App\Console\Commands;

use App\Models\TimesheetApproval;
use App\Models\Employee;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TimesheetApprovalAutoSubmit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:submitApproval';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'auto submit approval';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get the current month and year.
        $currentMonth = now()->format('M');
        $currentYearMonth = now()->format('Y-m');
    
        $employees = DB::table('employment as a')
                    ->leftjoin('designation as b', 'a.designation', '=', 'b.id')
                    ->leftjoin('department as c', 'a.department', '=', 'c.id')
                    ->whereIn('a.user_id', [219, 217, 180])
                    ->select('a.*', 'b.designationName', 'c.departmentName')
                    ->get();
    
        foreach ($employees as $employee) {
            // Check if a record already exists for the employee for the current month and year.
            $approvalRecord = TimesheetApproval::where('user_id', $employee->user_id)
                                ->where('month', $currentMonth)
                                ->where('year', $currentYearMonth)
                                ->first();
    
            // If no record found, create one.
            if (!$approvalRecord) {
                TimesheetApproval::create([
                    'user_id' => $employee->user_id,
                    'employee_id' => $employee->id,
                    'tenant_id' => $employee->tenant_id,
                    'month' => $currentMonth,
                    'year' => $currentYearMonth,
                    'employee_name' => $employee->employeeName,
                    'designation' => $employee->designationName,
                    'department' => $employee->departmentName,
                    'status' => 'pending',
                ]);
            }
        }
    
        $this->info('Process completed for user_ids 219, 217, and 180: Rows added/checked for the current month and year.');
    }
    

    


}
