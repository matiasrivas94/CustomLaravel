<?php

namespace Modules\Blog\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TagFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Blog\Entities\Tag::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->words(10, true);

        return [
            'name'          => $name,
            'slug'          => Str::slug($name),
            'color'         => $this->faker->randomElement(['red','yellow','green','blue','indigo','purple','pink']),
        ];
    }
}
