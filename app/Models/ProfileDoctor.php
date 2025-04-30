<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileDoctor extends Model
{
    use HasFactory;

    protected $table = 'profile_doctor';

    protected $guarded = [];
}
