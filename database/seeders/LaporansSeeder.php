<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class LaporansSeeder extends Seeder
{
    public function run()
    {
        DB::table('laporans')->insert([
            [
                'id_user' => 1, // ID pengguna yang valid
                'id_proyek' => 1,
                'id_sektor' => 1, // ID sektor yang valid
                'id_program' => 1, // ID program yang valid
                'judul' => 'Laporan A',
                'nama_proyek' => 'Proyek A',
                'tanggal' => 15,
                'bulan' => 'Februari',
                'tahun' => '2024',
                'realisasi' => '50000',
                'deskripsi' => 'Lorem ipsum odor amet, consectetuer adipiscing elit. Velit justo suscipit curae rhoncus donec nulla at pellentesque. Imperdiet vulputate vivamus suscipit sodales iaculis duis. Justo aliquam egestas diam dictum congue nibh blandit; pretium augue. Quam facilisi massa torquent dignissim fames ullamcorper vel aptent.',
                'message' => 'Pesan untuk Laporan A',
                'gambar_laporan' => json_encode(['default.png']),
                'kuartal' => 'kuartal1',
                'changed' => 0,
                'status' => 'draf',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_user' => 2, // ID pengguna yang valid
                'id_proyek' => 2,
                'id_sektor' => 2, // ID sektor yang valid
                'id_program' => 2, // ID program yang valid
                'judul' => 'Laporan B',
                'nama_proyek' => 'Proyek B',
                'tanggal' => 10,
                'bulan' => 'April',
                'tahun' => '2024',
                'realisasi' => '69000',
                'deskripsi' => 'Lorem ipsum odor amet, consectetuer adipiscing elit. Velit justo suscipit curae rhoncus donec nulla at pellentesque. Imperdiet vulputate vivamus suscipit sodales iaculis duis. Justo aliquam egestas diam dictum congue nibh blandit; pretium augue. Quam facilisi massa torquent dignissim fames ullamcorper vel aptent.',
                'message' => 'Pesan untuk Laporan B',
                'gambar_laporan' => json_encode(['default.png']),
                'kuartal' => 'kuartal2',
                'changed' => 0,
                'status' => 'revisi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_user' => 3, // ID pengguna yang valid
                'id_proyek' => 3,
                'id_sektor' => 3, // ID sektor yang valid
                'id_program' => 3, // ID program yang valid
                'judul' => 'Laporan C',
                'nama_proyek' => 'Proyek C',
                'tanggal' => 20,
                'bulan' => 'Juni',
                'tahun' => '2024',
                'realisasi' => '23000',
                'deskripsi' => 'Lorem ipsum odor amet, consectetuer adipiscing elit. Velit justo suscipit curae rhoncus donec nulla at pellentesque. Imperdiet vulputate vivamus suscipit sodales iaculis duis. Justo aliquam egestas diam dictum congue nibh blandit; pretium augue. Quam facilisi massa torquent dignissim fames ullamcorper vel aptent.',
                'message' => 'Pesan untuk Laporan C',
                'gambar_laporan' => json_encode(['default.png']),
                'kuartal' => 'kuartal3',
                'changed' => 1,
                'status' => 'terima',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_user' => 4, // ID pengguna yang valid
                'id_proyek' => 4,
                'id_sektor' => 4, // ID sektor yang valid
                'id_program' => 4, // ID program yang valid
                'judul' => 'Laporan D',
                'nama_proyek' => 'Proyek D',
                'tanggal' => 5,
                'bulan' => 'Agustus',
                'tahun' => '2024',
                'realisasi' => '10000',
                'deskripsi' => 'Lorem ipsum odor amet, consectetuer adipiscing elit. Velit justo suscipit curae rhoncus donec nulla at pellentesque. Imperdiet vulputate vivamus suscipit sodales iaculis duis. Justo aliquam egestas diam dictum congue nibh blandit; pretium augue. Quam facilisi massa torquent dignissim fames ullamcorper vel aptent.',
                'message' => 'Pesan untuk Laporan D',
                'gambar_laporan' => json_encode(['default.png']),
                'kuartal' => 'kuartal4',
                'changed' => 0,
                'status' => 'pengajuan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_user' => 5, // ID pengguna yang valid
                'id_proyek' => 5,
                'id_sektor' => 5, // ID sektor yang valid
                'id_program' => 5, // ID program yang valid
                'judul' => 'Laporan E',
                'nama_proyek' => 'Proyek E',
                'tanggal' => 25,
                'bulan' => 'Oktober',
                'tahun' => '2024',
                'realisasi' => '82000',
                'deskripsi' => 'Lorem ipsum odor amet, consectetuer adipiscing elit. Velit justo suscipit curae rhoncus donec nulla at pellentesque. Imperdiet vulputate vivamus suscipit sodales iaculis duis. Justo aliquam egestas diam dictum congue nibh blandit; pretium augue. Quam facilisi massa torquent dignissim fames ullamcorper vel aptent.',
                'message' => 'Pesan untuk Laporan E',
                'gambar_laporan' => json_encode(['default.png']),
                'kuartal' => 'kuartal4',
                'changed' => 0,
                'status' => 'tolak',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
