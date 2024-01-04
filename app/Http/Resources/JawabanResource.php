<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JawabanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request) 
    {
        return [
            'id' => $this->id,
            'soal_id'=>$this->soal_id,
            'opsi_pilihan_ganda_id'=>$this->opsi_pilihan_ganda_id,
            'jawaban_statement_id'=>$this->jawaban_statement_id,
            'jawaban_essay'=>$this->jawaban_essay,
            'jawaban_berupa_angka'=>$this->jawaban_berupa_angka,
            'user_id'=>$this->user_id,


        ];
    }
}
