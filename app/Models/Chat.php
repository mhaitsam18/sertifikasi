<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'chat';
    protected $guarded = ['id'];

    public function pengirim()
    {
        return $this->belongsTo(User::class, 'pengirim_id');
    }
    public function penerima()
    {
        return $this->belongsTo(User::class, 'penerima_id');
    }
    public function shareBerita()
    {
        return $this->belongsTo(ShareBerita::class);
    }
}
