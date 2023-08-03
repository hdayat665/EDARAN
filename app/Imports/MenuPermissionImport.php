<?php

namespace App\Imports;

use App\Models\MenuPermissionCode;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MenuPermissionImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $import = new MenuPermissionCode([
            'menu_id' => $row['menu_id'],
            'name' => $row['name'],
            'code' => $row['code'],
            'level_1' => $row['level_1'],
            'level_2' => $row['level_2'],
            'level_3' => $row['level_3'],
            'level_4' => $row['level_4'],
        ]);

        MenuPermissionCode::where('name', $row['name'])->delete();

        return $import;
    }
}
