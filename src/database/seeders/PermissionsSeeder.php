<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'name' => 'create'
            ],
            [
                'name' => 'read'
            ],
            [
                'name' => 'update'
            ],
            [
                'name' => 'delete'
            ],

        ];
        foreach ($permissions as $permission) {
            $data = new Permission();
            $data->name = $permission['name'];

            $data->save();
        }
    }
}
