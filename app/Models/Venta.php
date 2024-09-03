<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'ventas';
    protected $primaryKey = 'id_venta';
    protected $fillable = [
        'nombre_propietario',
        'fecha',
        'precio',
        'animal_id',
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id')->withDefault();
    }
}
