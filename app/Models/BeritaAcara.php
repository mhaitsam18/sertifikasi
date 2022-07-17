<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaAcara extends Model
{
    use HasFactory;
    protected $table = 'berita_acara';
    protected $guarded = ['id'];
    protected $with = ['jadwalAcara'];


    public function jadwalAcara()
    {
        return $this->belongsTo(JadwalAcara::class);
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class);
    }
}
