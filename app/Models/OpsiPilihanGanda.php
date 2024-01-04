<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpsiPilihanGanda extends Model
{
    use HasFactory;
    protected $table = 'opsi_pilihan_ganda';

    protected $fillable = ['option_text','soal_id',"point"];


    public function Soal()
    {
      return $this->belongsTo(Soal::class,'soal_id' );
    }

    public function Jawaban()
    {
        return $this->hasOne(Jawaban::class);
    }
}
