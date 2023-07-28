<?php

namespace App\Console\Commands;

use App\Models\UserParent;
use Illuminate\Console\Command;

class IncrementAgeParentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'increment:ageparent';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Increment the age of all userparent by one year';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $userparents = UserParent::all();

        foreach ($userparents as $userparent) {

            if (isset($userparent->age) && $userparent->age !== null) {

                $userparent->age++;
            }

            $userparent->save();
        }




        $this->info('Age of all persons has been incremented by one year.');

    }
}
