<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notifikasi extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'notifikasi';
    protected $guarded = ['id'];
    protected $with = ['user', 'creator'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriNotifikasi::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'sub_id');
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'sub_id');
    }

    public function berita()
    {
        return $this->belongsTo(Berita::class, 'sub_id');
    }
}
