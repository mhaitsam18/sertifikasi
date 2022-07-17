<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KomentarBerita extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'komentar_berita';
    protected $guarded = ['id'];
    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function berita()
    {
        return $this->belongsTo(Berita::class);
    }
}
