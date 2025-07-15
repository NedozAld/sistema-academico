<?php

// app/Models/Departamento.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $primaryKey = 'iddep';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['iddep', 'nombredep'];

    public function areas()
    {
        return $this->hasMany(Area::class, 'iddep', 'iddep');
    }
}
