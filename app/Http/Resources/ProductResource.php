<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'description'   => $this->description,
            'price'         => $this->price,
            'slug'          => $this->slug,
            'image'         => json_decode($this->image),
            'status'        => $this->status ? 'Active' : 'Inactive',
            'category'      => $this->whenLoaded('categories'),
            'category_id'   => $this->categories_id,
        ];
    }
}
