<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raza extends Model
{
    use HasFactory;
    protected $table = 'razas';
    protected $primaryKey = 'id_raza';
    public $timestamps = false;
    protected $fillable = [
        'nombre_raza',
    ];

    public function animales()
    {
        return $this->hasMany(Animales::class, 'raza_id');
    }
}
