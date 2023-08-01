<?php

namespace App\Console\Commands;

use App\Models\UserCompanion;
use Illuminate\Console\Command;

class IncrementAgeCompanionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'increment:agecompanion';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Increment the age of all usercompanion by one year';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $usercompanions = UserCompanion::all();

        foreach ($usercompanions as $usercompanion) {

            if (isset($usercompanion->age) && $usercompanion->age !== null) {

                $usercompanion->age++;
            }

            $usercompanion->save();
        }




        $this->info('Age of all persons has been incremented by one year.');

    }
}
