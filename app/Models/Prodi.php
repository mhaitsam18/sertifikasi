<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodi';
    protected $guarded = ['id'];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
    public function dosen()
    {
        return $this->hasMany(Dosen::class);
    }
    public function kaprodi()
    {
        return $this->belongsTo(Dosen::class);
    }
    public function acara()
    {
        return $this->hasMany(Acara::class);
    }

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }
}
