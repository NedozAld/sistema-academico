<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $table = 'profesores';
    protected $primaryKey = 'idpro';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idpro',
        'idare',
        'nombrespro',
        'apellidospro',
        'telefonopro',
        'correopro',
    ];

    // Relación con la tabla users (opcional, si deseas acceder al usuario desde el profesor)
    public function user()
    {
        return $this->hasOne(User::class, 'id_relacionado', 'idpro')->where('tipo_usuario', 'profesor');
    }
}
