<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $reqcuest): array
    {
        return [
            // 'data' => $this->collection, or 
            'data' => PostResource::collection($this->collection),
                // keunggulan collection bisa menggunakan query builder
            'meta' => [
                        'total_post' => $this->collection->count()
            ],
            
           
        ];
    }
}
