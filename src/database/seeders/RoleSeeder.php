<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'superadmin'
            ],
            [
                'name' => 'admin'
            ],
            [
                'name' => 'merchant'
            ],

        ];
        foreach ($roles as $role) {
            $data = new Role();
            $data->name = $role['name'];
        
            $data->save();
        }
    }
}
