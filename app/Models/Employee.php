<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Employee extends Authenticatable
{
    use HasFactory;
    use HasRoles;

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
        'profile_photo_url',
        'full_name'
    ];

    public function compnay()
    {
        return $this->belongsTo(Company::class);
    }


    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->paternal_surname . ' ' . $this->maternal_surname;
    }
}
