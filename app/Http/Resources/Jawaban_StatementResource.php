<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Jawaban_StatementResource extends JsonResource
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
            'statement_text'=>$this->statement_text,
            'soal_id'=>$this->soal_id,
            'point'=>$this->point,


        ];
    }
}
