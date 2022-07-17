<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShareBerita extends Model
{
    use HasFactory;
    protected $table = 'share_berita';
    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function berita()
    {
        return $this->belongsTo(Berita::class);
    }
    public function chat()
    {
        return $this->hasOne(Chat::class);
    }
}
