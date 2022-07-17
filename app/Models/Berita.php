<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Berita extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $table = 'berita';
    protected $guarded = ['id'];
    protected $with = ['penulis'];


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function penulis()
    {
        return $this->belongsTo(User::class, 'penulis_id');
    }
    public function komentar()
    {
        return $this->hasMany(KomentarBerita::class);
    }
    public function like()
    {
        return $this->hasMany(LikeBerita::class);
    }
}
