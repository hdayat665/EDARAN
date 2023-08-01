<?php

namespace App\Console\Commands;

use App\Models\UserChildren;
use Illuminate\Console\Command;

class IncrementAgeChildrenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'increment:agechildren';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Increment the age of all userchildren by one year';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $userchildrens = UserChildren::all();

        foreach ($userchildrens as $userchildren) {

            if (isset($userchildren->age) && $userchildren->age !== null) {

                $userchildren->age++;
            }

            $userchildren->save();
        }




        $this->info('Age of all persons has been incremented by one year.');

    }
}
