<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProfileDoctor extends Model
{
    use HasFactory;

    protected $table = 'profile_doctor';

    protected $guarded = [];
    public function userDoctor(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function chuyenKhoa(): BelongsTo
    {
        return $this->belongsTo(ChuyenKhoa::class, 'chuyen_khoa_id', 'id');
    }
}
