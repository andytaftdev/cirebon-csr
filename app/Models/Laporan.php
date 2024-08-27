<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporans';
    protected $guarded = [];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'id_proyek');
    }
    public function program()
    {
        return $this->belongsTo(Program::class, 'id_program');
    }




}
