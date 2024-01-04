<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $table = 'section';

    protected $fillable = ['nama_section','jumlah_soal_perSection','modul_id'];


    public function Modul()
    {
      return $this->belongsTo(Modul::class,'modul_id' );
    }

    public function Soal()
    {
        return $this->hasMany(Soal::class);
    }
}
