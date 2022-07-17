<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rekening extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'rekening';
    protected $guarded = ['id'];

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'rekening_tujuan_id');
    }
}
