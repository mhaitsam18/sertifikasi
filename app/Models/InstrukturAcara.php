<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstrukturAcara extends Model
{
    use HasFactory;
    protected $table = 'instruktur_acara';
    protected $guarded = ['id'];
    protected $with = ['dosen'];

    public function kelasAcara()
    {
        return $this->hasMany(KelasAcara::class);
    }
    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
    public function jadwalAcara()
    {
        return $this->hasMany(JadwalAcara::class);
    }
}
