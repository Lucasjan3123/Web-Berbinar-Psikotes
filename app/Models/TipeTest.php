<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeTest extends Model
{
    use HasFactory;

    protected $table = 'tipe_test';

    protected $fillable = ['nama_tipeTest'];


    public function tests()
    {
        return $this->hasMany(Test::class, 'tipe_test_id');
    }
}
