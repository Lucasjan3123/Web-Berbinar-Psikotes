<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    protected $table = 'jawaban';

    protected $fillable = ['soal_id','opsi_pilihan_ganda_id','jawaban_statement_id','jawaban_essay','jawaban_berupa_angka','user_id'];

    public function Soal()
    {
        return $this->belongsTo(Soal::class,'soal_id');
    }
    public function OpsiPilihanGanda()
    {
        return $this->belongsTo(OpsiPilihanGanda::class,'opsi_pilihan_ganda_id');
    }

    public function Jawaban_Statement()
    {
        return $this->belongsTo(Jawaban_Statement::class,'jawaban_statement_id');
    }


    public function Users()
    {
        return $this->belongsTo(User::class,'user_id');
    }



    // public function questions()
    // {
    //     return $this->belongsToMany(Soal::class)
    //         ->withPivot('option_pilihan_ganda_id', 'jawaban_statement_id', 'jawaban_essay', 'jawaban_berupa_angka');
    // }
}
