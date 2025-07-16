<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Titulacion extends Model
{
    protected $table = 'titulaciones';
    protected $primaryKey = 'idtit';
    public $incrementing = false;
    protected $keyType = 'string';

    // No incluimos 'idtit' porque se genera automáticamente con un trigger
    protected $fillable = ['detalletit', 'nivelestit'];

    public $timestamps = false; // Muy importante si no usas created_at y updated_at

    public function asignaturas()
    {
        return $this->hasMany(Asignatura::class, 'idtit', 'idtit');
    }
}
