<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CakeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [            
            "id" => $this->id,
            "name" => $this->name,
            "weight" => $this->weight,
            "value" => $this->value,
            "quantity" => $this->quantity,
            "created_at" => (new \DateTime($this->created_at))->format("Y-m-d H:i:s"),
            "interested" => InterestedResource::collection($this->interesteds)
        ];
    }
}
