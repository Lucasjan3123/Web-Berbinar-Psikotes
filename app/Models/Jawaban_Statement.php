<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban_Statement extends Model
{
    use HasFactory;

    protected $table = 'jawaban_statement';

    protected $fillable = ['statement_text','soal_id',"point"];

    public function Soal()
    {
      return $this->belongsTo(Soal::class,'soal_id' );
    }
}
