<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $table = 'test';

    protected $fillable = ['nama_test','tanggal','waktu_tes','total_soal_perTes','tipe_test_id'];


    public function tipeTest()
    {
        return $this->belongsTo(TipeTest::class, 'tipe_test_id');
    }

    public function Modul()
    {
        return $this->hasMany(Modul::class);
    }

    public function Soal()
    {
        return $this->hasMany(Soal::class);
    }

    public function Nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}
