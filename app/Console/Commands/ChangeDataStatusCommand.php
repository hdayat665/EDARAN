<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Log;
use Illuminate\Console\Command;
use App\Models\GeneralClaim;

class ChangeDataStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'change:data:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        
        // Fetch the records based on your criteria
        $data = GeneralClaim::all();

        // Update the status for each record
        foreach ($data as $record) {
            $record->hod = 'recommend';
            $record->status = 'recommend';
            $record->save();
        }

        $this->info('Status updated successfully.');
        Log::info('Scheduled command executed.');
    }
}
