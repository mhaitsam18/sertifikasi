<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'pembayaran';
    protected $guarded = ['id'];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }
    public function rekening()
    {
        return $this->belongsTo(Rekening::class, 'rekening_tujuan_id');
    }
}
