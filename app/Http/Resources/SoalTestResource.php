<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SoalTestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
                
            'Soal' => [
                'id' => $this->id,
                'test_id' => $this->test_id,
                'pertanyaan' => $this->pertanyaan,
                'jawaban_benar' => $this->jawaban_benar,
            ],
            
        ];

    }
}
