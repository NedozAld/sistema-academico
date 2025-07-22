<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleMatricula extends Model
{
    protected $table = 'detallematriculas';
    protected $primaryKey = 'iddet';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['idmat', 'idasi', 'detalledet'];

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class, 'idasi', 'idasi');
    }

    public function matricula()
    {
        return $this->belongsTo(Matricula::class, 'idmat', 'idmat');
    }
    public function tutorias()
    {
        return $this->hasMany(Tutoria::class, 'iddet', 'iddet');
    }
}
