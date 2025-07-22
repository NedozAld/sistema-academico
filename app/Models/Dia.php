<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    protected $table = 'dias';
    protected $primaryKey = 'iddia';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['nombredia'];

    public function horarios()
    {
        return $this->hasMany(Horario::class, 'iddia', 'iddia');
    }
}
