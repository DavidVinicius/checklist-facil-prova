<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InterestedResource extends JsonResource
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
            "email" => $this->email,
            "subscribed_at" => (new \DateTime($this->created_at))->format("Y-m-d H:i:s")
        ];
    }
}
