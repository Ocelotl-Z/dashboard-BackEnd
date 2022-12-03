<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    protected $fillable = [
        'name',
        'paternal_surname',
        'maternal_surname',
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
        'full_name'
    ];

    public function adminlte_image()
    {
        return $this->getProfilePhotoUrlAttribute();
    }

    public function adminlte_desc()
    {

        return implode(" | ",  $this->getRoleNames()->toArray());
    }
    public function adminlte_profile_url()
    {
        return 'profile/username';
    }

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->paternal_surname . ' ' . $this->maternal_surname;
    }

    // RELACIONES

    public function company()
    {
        return $this->hasOne(Company::class);
    }
}
