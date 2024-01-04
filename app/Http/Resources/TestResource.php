<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            
            'Test' => [
                'id' => $this->id,
                'nama_test' => $this->nama_test,
                'tanggal' => $this->tanggal,
                'waktu_tes' => $this->waktu_tes,
                'total_soal_perTes' => $this->total_soal_perTes,
                'tipe_test_id' => $this->tipe_test_id,
            ]
            
        ];
    }
}
