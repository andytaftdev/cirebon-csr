<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'admin',
                'email' => 'arkanadmin@example.com',
                'email_verified_at' => '2023-08-29 19:21:32',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'level' => 'admin',
            ],
            [
                'id' => 2,
                'name' => 'Arkan Naufal',
                'email' => 'arkanmitra@test.com',
                'email_verified_at' => '2023-08-29 19:21:34',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'level' => 'mitra',
            ],
            [
                'id' => 3,
                'name' => 'Hafy Reisa',
                'email' => 'hafymitra@test.com',
                'email_verified_at' => '2023-08-29 19:22:23',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'level' => 'mitra',
            ],
            [
                'id' => 4,
                'name' => 'Andy Top',
                'email' => 'mitraandy@test.com',
                'email_verified_at' => '2023-08-29 18:22:13',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'level' => 'mitra',
            ],
            [
                'id' => 5,
                'name' => 'Mitra Kita',
                'email' => 'mitrakita@test.com',
                'email_verified_at' => '2023-08-29 18:42:13',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'level' => 'mitra',
            ],
        ]);
    }
}
