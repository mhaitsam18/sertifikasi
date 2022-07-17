<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatusAcara extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'status_acara';
    protected $guarded = ['id'];

    public function acara()
    {
        return $this->hasMany(Acara::class);
    }
}
