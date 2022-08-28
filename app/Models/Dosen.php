<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dosen extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'dosen';
    protected $guarded = ['id'];
    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function kaprodi()
    {
        return $this->hasMany(Prodi::class, 'kaprodi_id');
    }

    public function acara()
    {
        return $this->hasMany(Acara::class, 'koordinator_id');
    }
    public function jadwalAcara()
    {
        return $this->hasMany(JadwalAcara::class, 'instruktur_id');
    }

    public function kelasAcara()
    {
        return $this->hasMany(KelasAcara::class, 'instruktur_id');
    }

    public function roleAdvance()
    {
        return $this->belongsToMany(RoleAdvance::class, 'dosen_role_advance');
    }

    public function instrukturAcara()
    {
        return $this->belongsToMany(Acara::class, 'instruktur_acara');
    }
}
