<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestante extends Model
{
    use HasFactory;

    protected $table = 'gestantes';

    protected $fillable = [
        'Fecha_prenez',
        'Fecha_estimada',
        'Fecha_parto',
        'crias',
        'animal_id',
    ];
    
    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }
}
