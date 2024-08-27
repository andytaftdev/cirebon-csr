<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sektor extends Model
{
    use HasFactory;

    protected $table = 'sektors';
    protected $guarded = [];



    public function programs()
    {
        return $this->hasMany(Program::class, 'id_sektor');
    }

    public function proyek()
    {
        return $this->hasMany(Proyek::class, 'id_sektor');
    }

    public function getRealisasi()
{
    $data = Sektor::with(['proyek' => function($query) {
            $query->select('id_sektor', \DB::raw('SUM(realisasi) as total'))
                  ->groupBy('id_sektor');
        }])
        ->get(['id', 'nama_sektor']);

    return $data;
}

}
