<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    use HasFactory;

    protected $table = 'doctor_schedules';

    protected $guarded = [];

    public function doctor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'doctor_id', 'id');
    }
}
