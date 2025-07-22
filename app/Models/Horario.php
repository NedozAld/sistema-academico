<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horarios';
    protected $primaryKey = 'idhor';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['iniciohor', 'finhor', 'iddia'];

    public function dia()
    {
        return $this->belongsTo(Dia::class, 'iddia', 'iddia');
    }
}
