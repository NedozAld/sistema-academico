<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = 'niveles';
    protected $primaryKey = 'idniv';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['idniv', 'nombreniv'];

    public function asignaturas()
    {
        return $this->hasMany(Asignatura::class, 'idniv', 'idniv');
    }
}
