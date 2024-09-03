<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animales';

<<<<<<< HEAD
    protected $primaryKey = 'id_animal';


=======
>>>>>>> 6485f541c9ecaabcd2dd0da5eb71f5c27aafb088
    protected $fillable = [
        'arete',
        'ingreso',
        'nombre_animal',
        'fecha',
        'sexo',
        'clasificacion',
        'precio_compra',
        'estado',
        'raza_id',
    ];

    public function raza()
    {
        return $this->belongsTo(Raza::class, 'raza_id');
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'animal_id');
    }

    public function vacunas()
    {
        return $this->hasMany(Vacuna::class, 'animal_id');
    }

    public function gestaciones()
    {
        return $this->hasMany(Gestacion::class, 'animal_id');
    }
}
