<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    protected $guarded = ['id'];
    protected $with = ['role'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class);
    }

    public function dosen()
    {
        return $this->hasOne(Dosen::class);
    }

    public function berita()
    {
        return $this->hasMany(Berita::class, 'penulis_id');
    }

    public function chatPengirim()
    {
        return $this->hasMany(Chat::class, 'pengirim_id');
    }
    public function chatPenerima()
    {
        return $this->hasMany(Chat::class, 'penerima_id');
    }

    public function komentarBerita()
    {
        return $this->hasMany(KomentarBerita::class);
    }

    public function notifikasi()
    {
        return $this->hasMany(Notifikasi::class);
    }

    public function creatorNotifikasi()
    {
        return $this->hasMany(Notifikasi::class, 'creator_id');
    }

    // public function peserta()
    // {
    //     return $this->hasMany(Peserta::class);
    // }

    // public function getTanggalLahirAttribute()
    // {
    //     return Carbon::parse($this->attributes['tanggal_lahir'])->translatedFormat('d F Y');
    // }
}
