<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $table = 'profesores';
    protected $primaryKey = 'idpro';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'idpro',
        'idare',
        'nombrespro',
        'apellidospro',
        'telefonopro',
        //'correopro'
    ];

    // Relación con el área
    public function area()
    {
        return $this->belongsTo(Area::class, 'idare', 'idare');
    }

    // Relación con asignaturas (muchas a muchas)
    public function asignaturas()
    {
        return $this->belongsToMany(Asignatura::class, 'pro_asi', 'idpro', 'idasi');
    }

    // Relación con el usuario del sistema (opcional)
    public function user()
    {
        return $this->hasOne(User::class, 'id_relacionado', 'idpro')->where('tipo_usuario', 'profesor');
    }
}
