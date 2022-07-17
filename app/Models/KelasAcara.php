<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasAcara extends Model
{
    use HasFactory;
    protected $table = 'kelas_acara';
    protected $guarded = ['id'];
    protected $with = ['acara'];

    public function acara()
    {
        return $this->belongsTo(Acara::class);
    }
    public function jadwalAcara()
    {
        return $this->hasMany(JadwalAcara::class);
    }
    public function peserta()
    {
        return $this->hasMany(Peserta::class);
    }

    public function instrukturAcara()
    {
        return $this->belongsTo(InstrukturAcara::class);
    }
    public function instruktur()
    {
        return $this->belongsTo(Dosen::class, 'instruktur_id');
    }
}
