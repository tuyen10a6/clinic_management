<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notification';

    protected $guarded = [];

    public function sender()
    {
        return $this->belongsTo(User::class, 'user_send');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'user_receiver');
    }
}
