<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InsuranceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'patient_id' => $this->patient_id,
            'name' => $this->name,
            'phone' => $this->phone,
            'country' => $this->country,            
            'address_1' => $this->address_1,
            'address_2' => $this->address_2,
            'state' => $this->state,
            'postcode' => $this->postcode,
            'city' => $this->city
        ];
    }
}
