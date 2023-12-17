<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fullname',
        'ktp_address',
        'now_address',
        'province_id',
        'regency_id',
        'district_id',
        'tel_no',
        'phone_no',
        'email',
        'citizenship',
        'birth_date',
        'birth_country_code',
        'birth_province_id',
        'birth_regency_id',
        'gender',
        'married_status',
        'religion',
        'registration_status',
        'image'
    ];

    protected $casts = [
        'user_id' => 'integer',
        'fullname' => 'string',
        'ktp_address' => 'string',
        'now_address' => 'string',
        'province_id' => 'integer',
        'regency_id' => 'integer',
        'district_id' => 'integer',
        'tel_no' => 'string',
        'phone_no' => 'string',
        'email' => 'string',
        'citizenship' => 'string',
        'birth_date' => 'date',
        'birth_country_code' => 'string',
        'birth_province_id' => 'integer',
        'birth_regency_id' => 'integer',
        'gender' => 'string',
        'married_status' => 'string',
        'religion' => 'string',
        'registration_status' => 'string',
        'image' => 'string',
    ];

    public static $rules = [
        'fullname' => 'required',
        'ktp_address' => 'required',
        'now_address' => 'required',
        'province_id' => 'required',
        'regency_id' => 'required',
        'district_id' => 'required',
        'tel_no' => 'required|numeric',
        'phone_no' => 'required|numeric',
        'email' => 'required|email',
        'citizenship' => 'required',
        'birth_date' => 'required|date',
        'gender' => 'required',
        'married_status' => 'required',
        'religion' => 'required',
        'image' => 'required|mimes:jpg,png'
    ];

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function regency(): BelongsTo
    {
        return $this->belongsTo(Regency::class);
    }

    public function birthRegency(): BelongsTo
    {
        return $this->belongsTo(Regency::class, 'birth_regency_id');
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'birth_country_code', 'code');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function getRouteKeyName()
    {
        return 'user_id';
    }
}
