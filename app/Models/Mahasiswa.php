<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'mahasiswa';
    protected $guarded = ['id'];
    protected $with = ['kelas', 'user'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function peserta()
    {
        return $this->hasMany(Peserta::class);
    }
}
