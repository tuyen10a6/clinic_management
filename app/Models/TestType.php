<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestType extends Model
{
    use HasFactory;

    protected $table = 'test_types';

    protected $guarded = [];


    public function orders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(TestOrder::class);
    }
}
