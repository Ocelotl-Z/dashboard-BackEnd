<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Employee extends Authenticatable
{
    use HasFactory;
    use HasRoles;
    use HasApiTokens;
    use HasProfilePhoto;

    protected $fillable = [
        'name',
        'email',
        'password',
        'paternal_surname',
        'maternal_surname',
        'company_id'
    ];

    protected $hidden = [
        'password',
    ];

    protected $appends = [
        'full_name',
        'profile_photo_url',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }


    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->paternal_surname . ' ' . $this->maternal_surname;
    }
}
