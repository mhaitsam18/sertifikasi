<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $table = 'presensi';
    protected $guarded = ['id'];
    protected $with = ['peserta'];
    // protected $with = ['user'];
    // protected $with = ['mahasiswa'];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    public function beritaAcara()
    {
        return $this->belongsTo(BeritaAcara::class);
    }
    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }
}
