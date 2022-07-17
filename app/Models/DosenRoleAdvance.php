<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenRoleAdvance extends Model
{
    use HasFactory;
    protected $table = 'dosen_role_advance';
    protected $guarded = ['id'];
}
