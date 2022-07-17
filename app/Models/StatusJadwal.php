<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatusJadwal extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'status_jadwal';
    protected $guarded = ['id'];

    public function jadwalAcara()
    {
        return $this->hasMany(JadwalAcara::class);
    }
}
