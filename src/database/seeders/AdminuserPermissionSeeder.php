<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class AdminuserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('adminuser_permission')->insert([
            'admin_id' => '2',
            'permission_id'=>'1',
        ]);
        DB::table('adminuser_permission')->insert([
            'admin_id' => '2',
            'permission_id'=>'2',
        ]);
        DB::table('adminuser_permission')->insert([
            'admin_id' => '2',
            'permission_id'=>'3',
        ]);
    }
}
