<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'country_name'
    ];

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class, 'birth_country_code', 'code');
    }
}
