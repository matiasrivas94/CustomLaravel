<?php

namespace Modules\People\Entities;

use App\Models\User;
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
        'updated_by_user_id',
    ];

    protected $dates = ['fecha_nacimiento'];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];
    
     //-------------------------------------METHODS-------------------------------------//

    protected static function newFactory()
    {
        return \Modules\People\Database\factories\PeopleFactory::new();
    }

     //-------------------------------------RELATIONS-------------------------------------//
    /**
     * Obtiene el usuario que hizo la ultima accion
     */
    public function updatedByUser()
    {
        return $this->belongsTo(User::class, 'updated_by_user_id', 'id');
    }
}
