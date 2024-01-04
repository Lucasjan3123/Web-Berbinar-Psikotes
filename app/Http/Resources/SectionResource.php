<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
          return [
               
            'Section' => [
                'id' => $this->id,
                'nama_section' => $this->nama_section,
                'jumlah_soal_perSection' => $this->jumlah_soal_perSection,
                'modul_id' => $this->modul_id,
            ],
            
            
        ];

    }
}
