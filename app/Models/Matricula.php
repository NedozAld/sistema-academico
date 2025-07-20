<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = 'matriculas';
    protected $primaryKey = 'idmat';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['idper', 'idest', 'fechamat', 'idtit', 'idniv'];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'idest', 'idest');
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'idper', 'idper');
    }

    public function titulacion()
    {
        return $this->belongsTo(Titulacion::class, 'idtit', 'idtit');
    }

    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'idniv', 'idniv');
    }

    public function detalles()
    {
        return $this->hasMany(DetalleMatricula::class, 'idmat', 'idmat');
    }
}
