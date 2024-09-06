<?php

namespace Tests\Feature;

namespace Tests\Feature\Restaurant;

use App\Models\Restaurant;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;


class DeleteRestaurantTest extends TestCase
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
    public function an_authenticate_user_must_delete_their_restaurants(): void
    {

        $restaurant = Restaurant::find()->id;

        $response = $this->deleteJson('/restaurants/destroy',compact($restaurant));
    
        $response->assertStatus(200);
        $response->assertJsonStructure(['messega' => 'OK']);
        $this->assertDatabaseCount('restaurants',0);
    }

    #[Test]
    public function a_unauthenticated_user_cannot_delete_a_restaurant(): void
    {
        $restaurant = Restaurant::find()->id;

        $response =$this->deleteJson('/restaurants/destroy',compact($restaurant));
    
        $response->assertStatus(401);
    
    }

}
