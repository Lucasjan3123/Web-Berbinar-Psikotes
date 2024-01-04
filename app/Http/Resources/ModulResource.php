<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ModulResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            
            'Modul' => [
                'id' => $this->id,
                'nama_modul' => $this->nama_modul,
                'test_id' => $this->id,
                'Jumlah_soal_perModul' => $this->jumlah_soal_perModul,
            ],
            
            
        ];
    }
}
