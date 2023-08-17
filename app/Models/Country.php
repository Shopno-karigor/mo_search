<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'country_name',
        'region',
        'currency',
        'country_code',
    ];
    public function Operators(): HasMany
    {
        return $this->hasMany(Operator::class);
    }
}
