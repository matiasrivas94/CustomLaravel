<?php

namespace Tests\Feature\Restaurant;

use App\Models\Restaurant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;


class PaginateRestaurantTest extends TestCase
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
    public function a_user_must_see_their_restaurants(): void
    {

        $restaurant = Restaurant::all();

        $response = $this->getJson('/restaurants/index',compact($restaurant));

        $response->assertStatus(200);
        $response->assertJsonCount(15,'data.restaurants');
        $response->assertJsonStructure([
            'data' => [
                'restaurants',
                'total',
                'current_page',
                'per_page',
                'total_pages',
                'count',
            ],
            'message','status','errors'
        ]);
    }
}
