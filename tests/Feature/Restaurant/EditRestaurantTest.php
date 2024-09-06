<?php

namespace Tests\Feature\Restaurant;

use App\Models\Restaurant;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class EditRestaurantTest extends TestCase
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
    public function the_slug_must_not_change_if_the_name_is_the_same(): void
    {
        $this->withoutExceptionHandling();//Ayuda a especificar el error

        $restaurant = Restaurant::factory()->create(); //Necesario para editar un restaurante si no hay en la BBDD.

        $data = [
            'name'          => 'New Restaurant',
            'description'   => 'Description',
        ];

        $response = $this->putJson('/restaurants/update',$data);
    
        $response->assertStatus(200); //created
        $response->assertJsonStructure(['message',
                                        'data' => [
                                          'restaurant' => ['id','name','slug','description']
                                        ],
                                        'errors',
                                        'status']);

        $this->assertDatabaseCount('restaurants',1);
        $restaurant = Restaurant::first(1);
        $this->assertTrue($restaurant->slug === $this->restaurant->slug);
        $this->assertDatabaseMissing('restaurants',[
            'name'               => 'New Restaurant',
            'description'        => 'Description',
        ]);
    }


    #[Test]
    public function an_authenticate_user_can_edit_a_restaurant(): void
    {
        $this->withoutExceptionHandling();//Ayuda a especificar el error

        $restaurant = Restaurant::factory()->create(); //Necesario para editar un restaurante si no hay en la BBDD.

        $data = [
            'name'          => 'New Restaurant',
            'description'   => 'Description',
        ];

        $response = $this->putJson('/restaurants/update',$data);
    
        $response->assertStatus(200);
        $response->assertJsonStructure(['message',
                                        'data' => [
                                          'restaurant' => ['id','name','slug','description']
                                        ],
                                        'errors',
                                        'status']);

        $this->assertDatabaseCount('restaurants',1);
        $restaurant = Restaurant::first();
        $this->assertStringContainsString('new restaurant',$restaurant->slug);
        $this->assertDatabaseMissing('restaurants',[
            'name'               => 'New Restaurant',
            'description'        => 'Description',
        ]);
    }


    #[Test]
    public function a_unauthenticated_user_can_edit_a_restaurant(): void
    {
        $this->withoutExceptionHandling();//Ayuda a especificar el error

        $restaurant = Restaurant::factory()->create(); //Necesario para editar un restaurante si no hay en la BBDD.

        $data = [
            'name'          => 'New Restaurant',
            'description'   => 'Description',
        ];

        $response = $this->putJson('/restaurants/update',$data);
    
        $response->assertStatus(401);
        $response->assertJsonStructure(['message',
                                        'data' => [
                                          'restaurant' => ['id','name','slug','description']
                                        ],
                                        'errors',
                                        'status']);

        $this->assertDatabaseCount('restaurants',1);
        $restaurant = Restaurant::first();
        $this->assertStringContainsString('new restaurant',$restaurant->slug);
        $this->assertDatabaseMissing('restaurants',[
            'name'               => 'New Restaurant',
            'description'        => 'Description',
        ]);
    }


    #[Test]
    public function name_must_be_required():void
    {
        $data = [
            'name'          => '',
            'description'   => 'New Restaurant Description',
        ];

        $response = $this->postJson('/restaurants/store',$data);
    
        $response->assertStatus(422);
        $response->assertJsonStructure(['messega','data','status','errors' => ['name']]);
    }


    #[Test]
    public function description_must_be_required():void
    {
        $data = [
            'name'          => 'Restaurant',
            'description'   => '',
        ];

        $response = $this->postJson('/restaurants/store',$data);
    
        $response->assertStatus(422);
        $response->assertJsonStructure(['messega','data','status','errors' => ['description']]);
    }
}
