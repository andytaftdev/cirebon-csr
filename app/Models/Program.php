<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $table = 'programs';
    protected $guarded = [];

    public function sektor()
    {
        return $this->belongsTo(Sektor::class, 'id_sektor');
    }


}
