<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peserta extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'peserta';
    protected $guarded = ['id'];
    // protected $with = ['statusPeserta'];
    // protected $with = ['user'];
    protected $with = ['mahasiswa'];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
    public function acara()
    {
        return $this->belongsTo(Acara::class);
    }
    public function kelasAcara()
    {
        return $this->belongsTo(KelasAcara::class);
    }
    public function statusPeserta()
    {
        return $this->belongsTo(StatusPeserta::class);
    }

    public function sertifikat()
    {
        return $this->hasMany(Sertifikat::class);
    }

    public function nilai()
    {
        return $this->hasOne(Nilai::class);
    }

    public function rating()
    {
        return $this->hasOne(Rating::class);
    }

    public function pembayaran()
    {
        // return $this->hasOne(Pembayaran::class);
        return $this->hasMany(Pembayaran::class);
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class);
    }
}
