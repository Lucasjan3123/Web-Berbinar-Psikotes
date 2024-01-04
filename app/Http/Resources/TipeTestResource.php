<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TipeTestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'Tipe_test' => [
                'id' => $this->id,
                'nama_tipeTest' => $this->nama_tipeTest,
            ],
        ];
    }
}
