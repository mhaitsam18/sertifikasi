<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Acara extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'acara';
    protected $guarded = ['id'];
    protected $with = ['koordinator', 'kategoriAcara', 'statusAcara'];

    public function koordinator()
    {
        return $this->belongsTo(Dosen::class, 'koordinator_id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function materi()
    {
        return $this->hasMany(Materi::class);
    }

    public function fasilitas()
    {
        return $this->hasMany(Fasilitas::class);
    }
    public function kategoriAcara()
    {
        return $this->belongsTo(KategoriAcara::class);
    }
    public function statusAcara()
    {
        return $this->belongsTo(StatusAcara::class);
    }

    public function kelasAcara()
    {
        return $this->hasMany(KelasAcara::class);
    }

    public function peserta()
    {
        return $this->hasMany(Peserta::class);
    }
    // public function jadwalAcara()
    // {
    //     return $this->hasMany(JadwalAcara::class);
    // }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }

    public function instrukturAcara()
    {
        return $this->belongsToMany(Dosen::class, 'instruktur_acara');
    }
}
