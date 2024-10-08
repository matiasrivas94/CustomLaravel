<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RestaurantCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'restaurants'   => $this->collection,
            'total'         => $this->total(),
            'count'         => $this->count(),
            'per_page'      => $this->per_page(),
            'current_page'  => $this->current_page(),
            'total_pages'   => $this->lastPage(),
        ];
    }
}
