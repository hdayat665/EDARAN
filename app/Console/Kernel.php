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
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\IncrementAgeChildrenCommand::class,
        \App\Console\Commands\IncrementAgeParentCommand::class,
        \App\Console\Commands\IncrementAgeCompanionCommand::class,
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

        $schedule->call(function () {
        $mailService = new MailService();
        $mailService->emailEventReminder(); // Pass any required data as an argument
        // Log::info('Email sent successfully');
        })->everyMinute();
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
