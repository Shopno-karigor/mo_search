<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;
    protected $fillable = [
        'operator_name',
        'country_id',
        'domestic_call',
        'domestic_sms',
        'domestic_internet',
        'international_call',
        'international_sms',
        'international_internet',
    ];
}
