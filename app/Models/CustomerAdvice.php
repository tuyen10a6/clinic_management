<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAdvice extends Model
{
    use HasFactory;

    protected $table = 'customer_advice';

    protected $guarded = [];
}
