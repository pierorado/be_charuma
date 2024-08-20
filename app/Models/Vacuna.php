<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacuna extends Model
{
    use HasFactory;

    protected $table = 'vacunas';

    protected $fillable = [
        'nombre_vacuna',
        'Fecha_administrada',
        'Fecha_programada',
        'animal_id',
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }
}
