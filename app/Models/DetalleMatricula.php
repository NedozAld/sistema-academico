<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleMatricula extends Model
{
    protected $table = 'detallematriculas';
    protected $primaryKey = 'iddet';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['iddet', 'idmat', 'idasi', 'detalledet'];

    public function matricula()
    {
        return $this->belongsTo(Matricula::class, 'idmat', 'idmat');
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class, 'idasi', 'idasi');
    }
}
