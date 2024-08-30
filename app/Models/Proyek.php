<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;
    protected $table = 'proyeks';
    protected $guarded = [];

    public function sektor()
    {
        return $this->belongsTo(Sektor::class, 'id_sektor');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'id_program');
    }
}
