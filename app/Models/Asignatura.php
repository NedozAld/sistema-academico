<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $table = 'asignaturas';
    protected $primaryKey = 'idasi';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['idasi', 'idtit', 'idniv', 'nombreasi', 'teoricosasi', 'practicosasi'];

    public function titulacion()
    {
        return $this->belongsTo(Titulacion::class, 'idtit', 'idtit');
    }

    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'idniv', 'idniv');
    }
}
