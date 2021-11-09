<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StaffResource extends JsonResource
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
            'role_id' => $this->role_id,
            'name' => $this->name,
            'nric' => $this->nric,
            'phone' => $this->phone,
            'marital_status' => $this->marital_status,
            'occupation' => $this->occupation,
            'birthdate' => $this->birthdate,
            'gender' => $this->gender,
            'religion' => $this->religion,
            'country' => $this->country,
            'race' => $this->race,
            'address_1' => $this->address_1,
            'address_2' => $this->address_2,
            'state' => $this->state,
            'postcode' => $this->postcode,
            'city' => $this->city
        ];
    }
}
