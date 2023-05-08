<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'email' => 'admin@example.com',
                'uuid' => 'uuid2',
                'password' => 'adminadmin',
                'name' => 'admin',
                'created_at' =>'2023-01-01 12:00:00',
                'updated_at' =>'2023-05-01 12:00:00'
            ],
        ];
        foreach ($users as $user) {
            $data = new Admin();
            $data->email = $user['email'];
            $data->uuid = $user['uuid'];
            $encrypted = Hash::make($user['password']);
            $data->password = $encrypted;
            $data->name = $user['name'];
            $data->created_at = $user['created_at'];
            $data->updated_at = $user['updated_at'];

            $data->save();
        }
    }
}
