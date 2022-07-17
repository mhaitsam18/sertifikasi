<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $table = 'materi';
    protected $guarded = ['id'];


    public function acara()
    {
        return $this->belongsTo(Acara::class, 'acara_id');
    }
}
