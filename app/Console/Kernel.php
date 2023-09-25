<?php

namespace App\Console;

use App\Models\UserParent;
use App\Models\UserChildren;
use App\Models\UserCompanion;
use App\Models\ClaimDateSetting;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Service\MailService;
use App\Models\TimesheetLog;
use App\Models\TimesheetAppeals;
use App\Models\TimesheetApproval;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\IncrementAgeChildrenCommand::class,
        \App\Console\Commands\IncrementAgeParentCommand::class,
        \App\Console\Commands\IncrementAgeCompanionCommand::class,
        \App\Console\Commands\TimesheetApprovalAutoSubmit::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

    protected function schedule(Schedule $schedule)
    {
        $date = ClaimDateSetting::first();
        $submitAdmin = $date->submit_claim_day_admin;
        $schedule->command('change:data:status')->monthlyOn($submitAdmin, '08:00');



        $ageChildren = UserChildren::first();
        $submitAgeChildren = $ageChildren->age;
        $schedule->command('increment:agechildren')->yearly($submitAgeChildren);
        // yearly

        $ageParent = UserParent::first();
        $submitAgeParent = $ageParent->age;
        $schedule->command('increment:ageparent')->yearly($submitAgeParent);

        $ageCompanion = UserCompanion::first();
        $submitAgeCompanion = $ageCompanion->age;
        $schedule->command('increment:agecompanion')->yearly($submitAgeCompanion);

        //send email for event reminder
        $schedule->call(function () {
        $mailService = new MailService();
        $mailService->emailEventReminder();
        })->everyFiveMinutes();

        //send email for user not yet completed log for curent date
        $schedule->call(function () {
        $mailService = new MailService();
        $mailService->emailLogMissedForToday(); 
        })->dailyAt('12:00');
        
        //send email for user not yet completed log for yesterday
        $schedule->call(function () {
        $mailService = new MailService();
        $mailService->emailLogMissedForYesterday(); 
        })->dailyAt('08:30');

         //send email for user not yet completed log for two days ago
        $schedule->call(function () {
        $mailService = new MailService();
        $mailService->emailLogMissedFor2daysAgo(); 
        })->dailyAt('14:00');

        $schedule->command('auto:submitApproval')->everyMinute();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
