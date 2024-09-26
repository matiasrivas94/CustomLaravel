<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Http\Resources\RestaurantCollection;
use App\Http\Resources\RestaurantResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Gate;

class RestaurantController extends Controller
{

    public function index()
    {
        $restaurants = auth()->user()->restaurants()->paginate();
        // return jsonResponse([
        //     'restaurants' => RestaurantResource::collection($restaurants)
        // ]);
        return jsonResponse(new RestaurantCollection($restaurants));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        //$restaurant = Restaurant::create($request->validate());
        $restaurant = auth()->user()->restaurants()->create($request->validate());
        return jsonResponse(data:[
            'restaurant' => RestaurantResource::make($restaurant),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        Gate::authorize('update',$restaurant);
        $restaurant->update($request->validate());
        return jsonResponse(data:[
            'restaurant' => RestaurantResource::make($restaurant),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        Gate::authorize('delete',$restaurant);
        $restaurant->delete();
        return jsonResponse();
    }
}
