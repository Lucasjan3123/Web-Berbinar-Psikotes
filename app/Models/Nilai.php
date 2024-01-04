<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';

    protected $fillable = ['test_id','jawaban_id','user_id','score','status'];


    public function Test()
    {
      return $this->belongsTo(Test::class,'test_id' );
    }


   

    public function Users()
    {
      return $this->belongsTo(User::class,'user_id' );
    }
}
