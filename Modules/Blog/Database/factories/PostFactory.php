<?php

namespace Modules\Blog\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Modules\Blog\Entities\Category;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Blog\Entities\Post::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->sentence();

        return [
            'name'          => $name,
            'slug'          => Str::slug($name),
            'extract'       => $this->faker->text(100),
            'body'          => $this->faker->text(150),
            'state'         => $this->faker->randomElement([1,2]),
            'user_id'       => User::all()->random()->id,
            'category_id'   => Category::all()->random()->id,
        ];
    }
}
