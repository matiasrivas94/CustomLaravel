<?php

namespace Modules\People\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class People extends Model
{
    use HasFactory;

    protected $table = 'people';

    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'cuil',
        'genero',
        'direccion',
        'celular',
        'email',
        'fecha_nacimiento',
        'lugar_nacimiento',
        'estado_civil',
        'observaciones',
        'grupo_sanguineo',
    ];
    
    protected static function newFactory()
    {
        return \Modules\People\Database\factories\PeopleFactory::new();
    }
}
