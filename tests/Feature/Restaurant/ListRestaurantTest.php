<?php

namespace Tests\Feature\Restaurant;

use App\Models\Restaurant;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ListRestaurantTest extends TestCase
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
    public function an_authenticate_user_must_see_their_restaurants(): void
    {

        $restaurant = Restaurant::all();

        $response = $this->getJson('/restaurants/index',compact($restaurant));
    
        $response->assertStatus(200);
        $response->assertJsonCount(10,'data.restaurants');
    }

    #[Test]
    public function a_unauthenticated_user_cannot_edit_a_restaurant(): void
    {
        $restaurant = Restaurant::all();

        $response = $this->getJson('/restaurants/index',compact($restaurant));
    
        $response->assertStatus(401);
    
    }

}
