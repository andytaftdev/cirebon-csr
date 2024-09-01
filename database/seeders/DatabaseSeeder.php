<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Panggil semua seeder di sini
        $this->call([
            UsersTableSeeder::class,
            IdentitiesSeeder::class,
            SektorsSeeder::class,
            ProgramsSeeder::class,
            ProyeksSeeder::class,
            LaporansSeeder::class,
        ]);
    }
}
