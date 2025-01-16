<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            // Admin
            [
                'name' => 'Admin',
                'prenom' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('11111111'),
                'role' => 'admin',
                'status' => 'active',
            ],



             // permanence
             [
                'name' => 'User',
                'prenom' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('11111111'),
                'role' => 'user',
                'status' => 'active',
             ],

            [
                'name' => 'Profil',
                'prenom' => 'profil',
                'email' => 'profil@gmail.com',
                'password' => Hash::make('11111111'),
                'role' => 'profil',
                'status' => 'active',
            ]

        ]);

    }
}
