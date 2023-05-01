<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'role_id' => '1',
                'email' => 'superadmin@example.com',
                'uuid' => 'uuid1',
                'password' => 'superadmin',
                'name' => 'superadmin',
                'created_at' =>'2023-01-01 12:00:00',
                'updated_at' =>'2023-05-01 12:00:00'
            ],
            [
                'role_id' => '2',
                'email' => 'admin@example.com',
                'uuid' => 'uuid2',
                'password' => 'admin',
                'name' => 'admin',
                'created_at' =>'2023-01-01 12:00:00',
                'updated_at' =>'2023-05-01 12:00:00'
            ],
            [
                'role_id' => '3',
                'email' => 'merchant@example.com',
                'uuid' => 'uuid3',
                'password' => 'merchant',
                'name' => 'merchant',
                'created_at' =>'2023-01-01 12:00:00',
                'updated_at' =>'2023-05-01 12:00:00'
            ],

        ];
        foreach ($users as $user) {
            $data = new User();
            $data->role_id = $user['role_id'];
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
