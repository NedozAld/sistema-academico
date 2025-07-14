<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiantes';
    protected $primaryKey = 'idest';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idest',
        'nombresest',
        'apellidosest',
        'direccionest',
        'mailest',
        'nacimientoest',
    ];

    // Relación con la tabla users (opcional, si deseas acceder al usuario desde el estudiante)
    public function user()
    {
        return $this->hasOne(User::class, 'id_relacionado', 'idest')->where('tipo_usuario', 'estudiante');
    }
}
