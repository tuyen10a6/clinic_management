<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestOrder extends Model
{
    use HasFactory;

    protected $table = 'test_orders';

    protected $guarded = [];

    public function patient(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'doctor_id');
    }

    public function testType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TestType::class);
    }
}
