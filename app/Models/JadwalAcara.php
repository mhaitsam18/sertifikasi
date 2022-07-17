<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalAcara extends Model
{
    use HasFactory;
    protected $table = 'jadwal_acara';
    protected $guarded = ['id'];
    protected $with = ['instruktur', 'statusJadwal', 'kelasAcara'];

    public function kelasAcara()
    {
        return $this->belongsTo(KelasAcara::class);
    }
    // public function acara()
    // {
    //     return $this->belongsTo(Acara::class);
    // }
    public function instruktur()
    {
        return $this->belongsTo(Dosen::class, 'instruktur_id');
    }
    public function statusJadwal()
    {
        return $this->belongsTo(StatusJadwal::class);
    }

    public function beritaAcara()
    {
        return $this->hasOne(BeritaAcara::class);
    }

    public function instrukturAcara()
    {
        return $this->belongsTo(InstrukturAcara::class, 'instruktur_acara_id');
    }
}
