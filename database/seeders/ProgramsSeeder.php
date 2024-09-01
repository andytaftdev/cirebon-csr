<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProgramsSeeder extends Seeder
{
    public function run()
    {
        DB::table('programs')->insert([
            [
                'id' => 1,
                'id_sektor' => 1, // ID sektor yang valid
                'nama_program' => 'Program A',
                'deskripsi' => 'asygad sudhauidah sdusahduasdha sdagdadha dahduadha',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'id_sektor' => 2, // ID sektor yang valid
                'nama_program' => 'Program B',
                'deskripsi' => 'asygad sudhauidah sdusahduasdha sdagdadha dahduadha',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'id_sektor' => 3, // ID sektor yang valid
                'nama_program' => 'Program C',
                'deskripsi' => 'asygad sudhauidah sdusahduasdha sdagdadha dahduadha',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'id_sektor' => 4, // ID sektor yang valid
                'nama_program' => 'Program D',
                'deskripsi' => 'asygad sudhauidah sdusahduasdha sdagdadha dahduadha',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'id_sektor' => 5, // ID sektor yang valid
                'nama_program' => 'Program E',
                'deskripsi' => 'asygad sudhauidah sdusahduasdha sdagdadha dahduadha',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
