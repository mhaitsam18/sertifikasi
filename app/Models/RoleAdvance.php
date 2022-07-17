<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoleAdvance extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'role_advance';
    protected $guarded = ['id'];

    public function dosen()
    {
        return $this->belongsToMany(Dosen::class, 'dosen_role_advance');
    }
}
