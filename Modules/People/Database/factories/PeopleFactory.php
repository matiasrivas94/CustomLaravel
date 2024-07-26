<?php

namespace Modules\People\Database\factories;

use App\Utils\FormData;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeopleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\People\Entities\People::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $headerCuil = $this->faker->randomElement(['20', '23', '24', '27']);
        $dni = strval($this->faker->numberBetween(10000000, 90000000));
        $lastCuil = $this->faker->numberBetween(0, 9);
        $cuil = $headerCuil . '-' . $dni . '-' . $lastCuil;

        return [
            'nombre' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),      
            'dni' => $dni,
            'cuil' => $cuil,
            'genero' => $this->faker->randomElement(FormData::$generos),
            'direccion' => $this->faker->streetAddress,
            'celular' => $this->faker->randomElement([null, $this->faker->phoneNumber]),
            'email' => $this->faker->email,
            'fecha_nacimiento' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'lugar_nacimiento' => $this->faker->city . ', ' . $this->faker->state,
            'fecha_ingreso' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'estado_civil' => $this->faker->randomElement(FormData::$estadosCiviles),
            'observaciones' => $this->faker->randomElement([null, ($this->faker->words(random_int(5, 10), true))]),
            'grupo_sanguineo' => $this->faker->randomElement(FormData::$gruposSanguineos),
            'updated_by_user_id' => User::all()->random()->id
        ];
    }
}

