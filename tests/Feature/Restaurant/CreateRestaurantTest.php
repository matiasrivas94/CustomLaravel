<?php

namespace Tests\Feature\Restaurant;

use App\Models\Restaurant;
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
    public function a_user_can_create_a_restaurant(): void
    {
        $this->withoutExceptionHandling();//Ayuda a especificar el error

        $data = [
            'name'          => 'New Restaurant',
            'description'   => 'Description',
        ];

        $response = $this->postJson('/restaurants/store',$data);
    
        $response->assertStatus(200); //created
        $response->assertJsonStructure(['message',
                                        'data' => [
                                          'restaurant' => ['id','name','slug','description']
                                        ],
                                        'errors',
                                        'status']);

        $this->assertDatabaseCount('restaurants',1);

        $this->assertDatabaseHas('restaurants',[
            'id'                 =>  1,
            'name'               => 'New Restaurant',
            'description'        => 'Description',
            'updated_by_user_id' =>  1,
        ]);
    }


    #[Test]
    public function a_unauthenticated_user_cannot_created_a_restaurant(): void
    {
        $restaurant = Restaurant::all();

        $response = $this->postJson('/restaurants/index',compact($restaurant));
    
        $response->assertStatus(401);
    
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
