<?php

// app/Models/Area.php
// app/Models/Area.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';
    protected $primaryKey = 'idare';
    public $incrementing = false;
    protected $keyType = 'string';

    // 👇 Esta línea desactiva los timestamps
    public $timestamps = false;

    protected $fillable = ['idare', 'nombreare', 'iddep'];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'iddep', 'iddep');
    }
}
