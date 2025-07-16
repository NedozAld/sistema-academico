<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $table = 'periodos';
    protected $primaryKey = 'idper';
    public $incrementing = false;
    protected $keyType = 'string';

    // ✅ NO incluyas idper en fillable porque lo genera el trigger
    protected $fillable = ['detalleper', 'inicioper', 'finper'];

    // ✅ Desactiva los timestamps si no existen en tu tabla
    public $timestamps = false;

    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'idper', 'idper');
    }
}
