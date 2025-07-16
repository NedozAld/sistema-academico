<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $table = 'periodos';
    protected $primaryKey = 'idper';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['idper', 'detalleper', 'inicioper', 'finper'];

    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'idper', 'idper');
    }
}

