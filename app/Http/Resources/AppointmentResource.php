<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
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
            'staff' => $this->staff,
            'patient' => $this->patient,
            'case' => $this->case,
            'patient_id' => $this->patient_id,
            'staff_id' => $this->staff_id,
            'case_id' => $this->case_id,
            'description' => $this->description,
            'date' => $this->date,
            'time' => $this->time
        ];
    }
}
