<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConsultationResource extends JsonResource
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
            'patient_name' => $this->patient->name,
            'patient_nric' => $this->patient->nric,
            'patient_created_date' => $this->patient->created_at,
            'patient_diagnosis' => $this->diagnosis,
            'patient_symptoms' => $this->symptoms,
            'patient_blood' => $this->blood,
            'patient_allergy' => $this->allergy,
            'patient_medication' => $this->medication,
            'patient_social_hist' => $this->social_hist,
            'patient_family_hist' => $this->family_hist,
            'patient_disability_hist' => $this->disability_hist,
            'patient' => $this->patient
        ];
    }
}
