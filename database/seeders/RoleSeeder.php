<?php

namespace Database\Seeders;

use App\Imports\MenuPermissionImport;
use App\Models\MenuPermissionCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // $file = public_path('storage/seeder/menu_permission_code.csv');

        try {
            Excel::import(new MenuPermissionImport, 'storage/seeder/menu_permission_code.csv');
            $this->command->info('Excel data successfully seeded.');
        } catch (\Exception $e) {
            $this->command->error('Seeder encountered an error: ' . $e->getMessage());
        }

        // try {
        //     $data = [
        //         'name' => 'test',
        //         'code' => 'code'
        //     ];

        //     MenuPermissionCode::insert($data);
        // } catch (\Throwable $th) {
        //     dd($th->getMessage());
        // }
    }
}
