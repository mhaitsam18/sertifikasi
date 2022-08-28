<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'role';
    protected $fillable = ['id', 'nama'];

    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function kategoriNotifikasi()
    {
        return $this->hasMany(KategoriNotifikasi::class);
    }
}
