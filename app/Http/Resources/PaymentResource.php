<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'payment' => $this->type,
            'patient' => $this->prescription->patient,
            'prescription_id' => $this->prescription->id,
            'status' => $this->status,
            // 'insurance' => $this->insurance,
            // 'patient' => $this->insurance->patient
        ];
    }
}
