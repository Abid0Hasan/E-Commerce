<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => 'adminpass',
                'is_admin' => '1',

            ],
            [
                'name' => 'User',
                'email' => 'user@user.com',
                'password' => 'userpass',
                'is_admin' => null,
            ],
            [
                'name' => 'Client',
                'email' => 'client@client.com',
                'password' => 'clientpass',
                'is_admin' => null,
            ]
        ];

        foreach($users as $user)
        {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password'])
            ]);
        }
    }
}
