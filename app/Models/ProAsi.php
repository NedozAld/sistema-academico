<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProAsi extends Model
{
    protected $table = 'pro_asi';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;

    protected $fillable = ['idpro', 'idasi'];

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'idpro', 'idpro');
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class, 'idasi', 'idasi');
    }
}
