<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NilaiResource extends JsonResource
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
            'test_id'=>$this->test_id,
            'jawaban_id'=>$this->jawaban_id,
            'user_id'=>$this->user_id,
            'score'=>$this->score,
            'status'=>$this->status,


        ];
    }
}
