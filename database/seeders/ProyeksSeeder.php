<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProyeksSeeder extends Seeder
{
    public function run()
    {
        DB::table('proyeks')->insert([
            [
                'id' => 1,
                'id_sektor' => 1, // ID sektor yang valid
                'id_program' => 1, // ID program yang valid
                'nama_proyek' => 'Proyek A',
                'kecamatan' => 'Kecamatan X',
                'tanggal_mulai' => '2024-01-01',
                'tanggal_akhir' => '2024-06-30',
                'tanggal_terbit' => '2024-02-15',
                'jumlah_mitra' => 5,
                'deskripsi' => 'Lorem ipsum odor amet, consectetuer adipiscing elit. Velit justo suscipit curae rhoncus donec nulla at pellentesque. Imperdiet vulputate vivamus suscipit sodales iaculis duis. Justo aliquam egestas diam dictum congue nibh blandit; pretium augue. Quam facilisi massa torquent dignissim fames ullamcorper vel aptent.',
                'gambar_proyek' => json_encode(['default.png']),
                'kuartal' => 'kuartal1',
                'status' => 'Aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'id_sektor' => 2, // ID sektor yang valid
                'id_program' => 2, // ID program yang valid
                'nama_proyek' => 'Proyek B',
                'kecamatan' => 'Kecamatan Y',
                'tanggal_mulai' => '2024-03-01',
                'tanggal_akhir' => '2024-09-30',
                'tanggal_terbit' => '2024-04-10',
                'jumlah_mitra' => 10,
                'deskripsi' => 'Lorem ipsum odor amet, consectetuer adipiscing elit. Velit justo suscipit curae rhoncus donec nulla at pellentesque. Imperdiet vulputate vivamus suscipit sodales iaculis duis. Justo aliquam egestas diam dictum congue nibh blandit; pretium augue. Quam facilisi massa torquent dignissim fames ullamcorper vel aptent.',
                'gambar_proyek' => json_encode(['default.png']),
                'kuartal' => 'kuartal2',
                'status' => 'Pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'id_sektor' => 3, // ID sektor yang valid
                'id_program' => 3, // ID program yang valid
                'nama_proyek' => 'Proyek C',
                'kecamatan' => 'Kecamatan Z',
                'tanggal_mulai' => '2024-05-01',
                'tanggal_akhir' => '2024-12-31',
                'tanggal_terbit' => '2024-06-20',
                'jumlah_mitra' => 8,
                'deskripsi' => 'Lorem ipsum odor amet, consectetuer adipiscing elit. Velit justo suscipit curae rhoncus donec nulla at pellentesque. Imperdiet vulputate vivamus suscipit sodales iaculis duis. Justo aliquam egestas diam dictum congue nibh blandit; pretium augue. Quam facilisi massa torquent dignissim fames ullamcorper vel aptent.',
                'gambar_proyek' => json_encode(['default.png']),
                'kuartal' => 'kuartal3',
                'status' => 'Selesai',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'id_sektor' => 4, // ID sektor yang valid
                'id_program' => 4, // ID program yang valid
                'nama_proyek' => 'Proyek D',
                'kecamatan' => 'Kecamatan W',
                'tanggal_mulai' => '2024-07-01',
                'tanggal_akhir' => '2024-11-30',
                'tanggal_terbit' => '2024-08-05',
                'jumlah_mitra' => 7,
                'deskripsi' => 'Lorem ipsum odor amet, consectetuer adipiscing elit. Velit justo suscipit curae rhoncus donec nulla at pellentesque. Imperdiet vulputate vivamus suscipit sodales iaculis duis. Justo aliquam egestas diam dictum congue nibh blandit; pretium augue. Quam facilisi massa torquent dignissim fames ullamcorper vel aptent.',
                'gambar_proyek' => json_encode(['default.png']),
                'kuartal' => 'kuartal4',
                'status' => 'Aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'id_sektor' => 5, // ID sektor yang valid
                'id_program' => 5, // ID program yang valid
                'nama_proyek' => 'Proyek E',
                'kecamatan' => 'Kecamatan V',
                'tanggal_mulai' => '2024-08-01',
                'tanggal_akhir' => '2024-12-31',
                'tanggal_terbit' => '2024-09-15',
                'jumlah_mitra' => 9,
                'deskripsi' => 'Lorem ipsum odor amet, consectetuer adipiscing elit. Velit justo suscipit curae rhoncus donec nulla at pellentesque. Imperdiet vulputate vivamus suscipit sodales iaculis duis. Justo aliquam egestas diam dictum congue nibh blandit; pretium augue. Quam facilisi massa torquent dignissim fames ullamcorper vel aptent.',
                'gambar_proyek' => json_encode(['default.png']),
                'kuartal' => 'kuartal5',
                'status' => 'Pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
