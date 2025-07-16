<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = 'niveles';
    protected $primaryKey = 'idniv';
    public $incrementing = false;
    protected $keyType = 'string';

    // ⚠️ Ya NO incluyas 'idniv' aquí porque el trigger lo genera automáticamente
    protected $fillable = ['nombreniv'];

    // ❗ Indica que tu tabla NO usa timestamps
    public $timestamps = false;

    public function asignaturas()
    {
        return $this->hasMany(Asignatura::class, 'idniv', 'idniv');
    }
}
