<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class KegiatansSeeder extends Seeder
{
    public function run()
    {
        DB::table('kegiatans')->insert([
            [
                'judul' => 'Kegiatan A',
                'deskripsi' => 'Lorem ipsum odor amet, consectetuer adipiscing elit. Velit justo suscipit curae rhoncus donec nulla at pellentesque. Imperdiet vulputate vivamus suscipit sodales iaculis duis. Justo aliquam egestas diam dictum congue nibh blandit; pretium augue. Quam facilisi massa torquent dignissim fames ullamcorper vel aptent.',
                'tags' => json_encode(['tag1', 'tag2']),
                'gambar_kegiatan' => 'default.png',
                'status' => 1,
                'terbit' => '2024-01-15',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Kegiatan B',
                'deskripsi' => 'Lorem ipsum odor amet, consectetuer adipiscing elit. Velit justo suscipit curae rhoncus donec nulla at pellentesque. Imperdiet vulputate vivamus suscipit sodales iaculis duis. Justo aliquam egestas diam dictum congue nibh blandit; pretium augue. Quam facilisi massa torquent dignissim fames ullamcorper vel aptent.',
                'tags' => json_encode(['tag3', 'tag4']),
                'gambar_kegiatan' => 'default.png',
                'status' => 0,
                'terbit' => '2024-02-20',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Kegiatan C',
                'deskripsi' => 'Lorem ipsum odor amet, consectetuer adipiscing elit. Velit justo suscipit curae rhoncus donec nulla at pellentesque. Imperdiet vulputate vivamus suscipit sodales iaculis duis. Justo aliquam egestas diam dictum congue nibh blandit; pretium augue. Quam facilisi massa torquent dignissim fames ullamcorper vel aptent.',
                'tags' => json_encode(['tag5', 'tag6']),
                'gambar_kegiatan' => 'default.png',
                'status' => 1,
                'terbit' => '2024-03-10',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Kegiatan D',
                'deskripsi' => 'Lorem ipsum odor amet, consectetuer adipiscing elit. Velit justo suscipit curae rhoncus donec nulla at pellentesque. Imperdiet vulputate vivamus suscipit sodales iaculis duis. Justo aliquam egestas diam dictum congue nibh blandit; pretium augue. Quam facilisi massa torquent dignissim fames ullamcorper vel aptent.',
                'tags' => json_encode(['tag7', 'tag8']),
                'gambar_kegiatan' => 'default.png',
                'status' => 0,
                'terbit' => '2024-04-05',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'judul' => 'Kegiatan E',
                'deskripsi' => 'Lorem ipsum odor amet, consectetuer adipiscing elit. Velit justo suscipit curae rhoncus donec nulla at pellentesque. Imperdiet vulputate vivamus suscipit sodales iaculis duis. Justo aliquam egestas diam dictum congue nibh blandit; pretium augue. Quam facilisi massa torquent dignissim fames ullamcorper vel aptent.',
                'tags' => json_encode(['tag9', 'tag10']),
                'gambar_kegiatan' => 'default.png',
                'status' => 1,
                'terbit' => '2024-05-25',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
