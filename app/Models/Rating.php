<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = 'rating';
    protected $guarded = ['id'];
    protected $with = ['peserta'];
    // protected $with = ['user'];
    // protected $with = ['mahasiswa'];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    public function acara()
    {
        return $this->belongsTo(Acara::class);
    }
    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }
}
