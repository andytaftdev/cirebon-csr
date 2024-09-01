<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SektorsSeeder extends Seeder
{
    public function run()
    {
        DB::table('sektors')->insert([
            [
                'id' => 1,
                'nama_sektor' => 'Sektor Jawa',
                'deskripsi_sektor' => 'adfdg afjsbadij dhaskdkahusd akdhad nha',
                'gambar_sektor' => 'default.png',
                'kuartal' => 'kuartal1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nama_sektor' => 'Sektor Bali',
                'deskripsi_sektor' => 'deskripsi untuk sektor Bali',
                'gambar_sektor' => 'default.png',
                'kuartal' => 'kuartal2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nama_sektor' => 'Sektor Sumatra',
                'deskripsi_sektor' => 'deskripsi untuk sektor Sumatra',
                'gambar_sektor' => 'default.png',
                'kuartal' => 'kuartal3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'nama_sektor' => 'Sektor Kalimantan',
                'deskripsi_sektor' => 'deskripsi untuk sektor Kalimantan',
                'gambar_sektor' => 'default.png',
                'kuartal' => 'kuartal4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'nama_sektor' => 'Sektor Sulawesi',
                'deskripsi_sektor' => 'deskripsi untuk sektor Sulawesi',
                'gambar_sektor' => 'default.png',
                'kuartal' => 'kuartal5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
