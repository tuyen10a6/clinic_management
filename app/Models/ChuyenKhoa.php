<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChuyenKhoa extends Model
{
    use HasFactory;

    protected $table = 'chuyen_khoa';

    protected $guarded = [];

    public function profileDoctor(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProfileDoctor::class, 'chuyen_khoa_id', 'id');
    }
}
