<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;
    protected $table = 'soal';

    protected $fillable = ['test_id','modul_id','section_id','pertanyaan','jawaban_benar'];


    public function Modul()
    {
      return $this->belongsTo(Modul::class,'modul_id' );
    }

    public function Section()
    {
      return $this->belongsTo(Section::class,'section_id' );
    }

    public function Tes()
    {
      return $this->belongsTo(Test::class,'test_id' );
    }

    public function OpsiPilihanGanda()
    {
        return $this->hasMany(OpsiPilihanGanda::class);
    }

    public function Jawaban_Statement()
    {
        return $this->hasMany(Jawaban_Statement::class);
    }

    // public function Jawaban()
    // {
    //     return $this->hasMany(Jawaban::class);
    // }
}
