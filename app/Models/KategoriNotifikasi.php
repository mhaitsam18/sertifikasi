<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriNotifikasi extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'kategori_notifikasi';
    protected $guarded = ['id'];

    public function notifikasi()
    {
        return $this->hasMany(Notifikasi::class);
    }
}
