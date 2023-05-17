<?php

namespace Modules\Blog\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ImageFactory extends Factory
{ 
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Blog\Entities\Image::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Formas de almacenar las imagenes
        return [
            //'url' => $this->faker->image('public/storage/posts', 640, 480, null, true)//public/storage/posts/imagen.jpg
            //'url' => $this->faker->image('public/storage/posts', 640, 480, null, false)//imagen.jpg
            'url' => 'post/' . $this->faker->image('public/storage/posts', 640, 480, null, false)//posts/imagen.jpg
        ];
    }
}
