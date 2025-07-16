<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiantes';
    protected $primaryKey = 'idest';
    public $incrementing = false;
    protected $keyType = 'string'; // ← NECESARIO para evitar el error
    public $timestamps = false;

    protected $fillable = [
        'idest',
        'nombresest',
        'apellidosest',
        'direccionest',
        'mailest',
        'nacimientoest',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id_relacionado', 'idest')->where('tipo_usuario', 'estudiante');
    }
}
