<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrescriptionResource extends JsonResource
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
            'pres_desc' => $this->description,
            'appt' => $this->appointment,
            // 'pat_id' => $this->appointment->patient_id,
            // 'pat_name' => $this->appointment->patient->name,
            // 'pat' => $this->appointment->patient,
            'pat' => $this->patient,
            'pat_name' => $this->patient->name,
            // 'insurance' => $this->appointment->patient->insurances->where('patient_id', '=', $this->appointment->patient_id)
            'insurance' => $this->patient->insurances->where('patient_id', '=', $this->patient->id)
        ];
    }
}
