<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\ClaimDateSetting;
use App\Service\MailService;
use App\Models\TimesheetLog;
use App\Models\TimesheetAppeals;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

//     protected function schedule(Schedule $schedule)
// {

//     // $schedule->call(function () {
//     //     TimesheetAppeals::orderBy('id', 'desc')->take(1)->delete();
//     // })->dailyAt('12:46');
//     $schedule->call(function () {
//         Log::info('Scheduler is working yang baru!');
//     })->everyMinute();

// }

// protected function schedule(Schedule $schedule)
// {
//     // $date = ClaimDateSetting::first();
//     // $submitAdmin = $date->submit_claim_day_admin;
//     // $schedule->command('change:data:status')->monthlyOn($submitAdmin, '08:00');

//     $schedule->call(function () {
//         $mailService = new MailService(); // Create an instance of your mail service
//         $emailData = $mailService->getEmailData(); // Retrieve the email data
//         $mailService->sendEmail($emailData); // Call your mail service's email sending function
//     })->dailyAt('16:52');
// }

protected function schedule(Schedule $schedule)
{
    $schedule->call(function () {
        $mailService = new MailService();
        $mailService->emailToApproverAppeal123(); // Pass any required data as an argument
        Log::info('Email sent successfully to ');
    })->dailyAt('17:28');
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
