<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;
    protected $table = 'fasilitas';
    protected $guarded = ['id'];
    protected $with = ['acara'];

    public function acara()
    {
        return $this->belongsTo(Acara::class);
    }
}
