<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutoria extends Model
{
    protected $table = 'tutorias';
    protected $primaryKey = 'idtut';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['iddet', 'idhor', 'detalletut'];

    public function detalle()
    {
        return $this->belongsTo(DetalleMatricula::class, 'iddet', 'iddet');
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class, 'idhor', 'idhor');
    }
}
