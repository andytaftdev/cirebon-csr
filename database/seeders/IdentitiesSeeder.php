<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class IdentitiesSeeder extends Seeder
{
    public function run()
    {
        DB::table('identities')->insert([
            [
                'id_user' => 1, // ID user yang valid
                'mitra_logo' => 'default.png',
                'nama_mitra' => 'Mitra A',
                'nama_pt' => 'Perusahaan A',
                'nomor_hp' => '081234567890',
                'alamat' => 'Alamat A',
                'deskripsi' => 'Lorem ipsum odor amet, consectetuer adipiscing elit. Integer donec egestas duis leo nostra facilisis integer porttitor.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_user' => 2, // ID user yang valid
                'mitra_logo' => 'default.png',
                'nama_mitra' => 'Mitra B',
                'nama_pt' => 'Perusahaan B',
                'nomor_hp' => '082345678901',
                'alamat' => 'Alamat B',
                'deskripsi' => 'Lorem ipsum odor amet, consectetuer adipiscing elit. Integer donec egestas duis leo nostra facilisis integer porttitor.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_user' => 3, // ID user yang valid
                'mitra_logo' => 'images/mitrac.png',
                'nama_mitra' => 'Mitra C',
                'nama_pt' => 'Perusahaan C',
                'nomor_hp' => '083456789012',
                'alamat' => 'Alamat C',
                'deskripsi' => 'Lorem ipsum odor amet, consectetuer adipiscing elit. Integer donec egestas duis leo nostra facilisis integer porttitor.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_user' => 4, // ID user yang valid
                'mitra_logo' => 'default.png',
                'nama_mitra' => 'Mitra D',
                'nama_pt' => 'Perusahaan D',
                'nomor_hp' => '084567890123',
                'alamat' => 'Alamat D',
                'deskripsi' => 'Lorem ipsum odor amet, consectetuer adipiscing elit. Integer donec egestas duis leo nostra facilisis integer porttitor.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_user' => 5, // ID user yang valid
                'mitra_logo' => 'default.png',
                'nama_mitra' => 'Mitra E',
                'nama_pt' => 'Perusahaan E',
                'nomor_hp' => '085678901234',
                'alamat' => 'Alamat E',
                'deskripsi' => 'Lorem ipsum odor amet, consectetuer adipiscing elit. Integer donec egestas duis leo nostra facilisis integer porttitor.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
