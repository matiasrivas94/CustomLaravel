<?php

namespace Tests\Feature\Restaurant;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CreateRestaurantTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    #[Test]
    public function user_can_register(): void
    {
        //$this->withoutExceptionHandling();//Ayuda a especificar el error

        $data = [
            'name'          => 'New Restaurant',
            'description'   => 'Description',
        ];

        $response = $this->postJson('/store',$data);
    
        $response->assertStatus(200); //created
        $response->assertJsonStructure(['message','data','errors','status']);
        $response->assertJsonFragment([
            'menssage' => 'OK', 'data' => [
                'restaurant' => [
                    'id'            =>  1,
                    'name'          => 'New Restaurant',
                    'slug'          => 'new_restaurant',
                    'description'   => 'Description',
                ]
            ], 'status' => 200
        ]);

        $this->assertDatabaseCount('restaurants',1);

        $this->assertDatabaseHas('restaurants',[
            'id'            =>  1,
            'name'          => 'New Restaurant',
            'slug'          => 'new_restaurant',
            'description'   => 'Description',
        ]);
    }

}
