<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatusPeserta extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'status_peserta';
    protected $guarded = ['id'];

    public function peserta()
    {
        return $this->hasMany(Peserta::class);
    }
}
