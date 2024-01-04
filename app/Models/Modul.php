<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    use HasFactory;

    protected $table = 'modul';

    protected $fillable = ['nama_modul','jumlah_soal_perModul','test_id'];


    public function Test()
    {
      return $this->belongsTo(Test::class,'test_id' );
    }

    public function Section()
    {
        return $this->hasMany(Section::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }


    public function Soal()
    {
        return $this->hasMany(Soal::class);
    }
}
