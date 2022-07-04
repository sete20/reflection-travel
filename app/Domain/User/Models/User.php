<?php

namespace App\Domain\User\Models;

use App\Support\Concerns\HasFactory;
use App\Support\Traits\HasPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasPassword;

    protected function serializeDate(\DateTimeInterface $date)
    {
        return ($date) ? $date->format('Y-m-d H:i:s') : null;
    }
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    protected $appends = ['full_name'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeIsUsers($query) {
        return $query->whereHas('roles', function ($role) {
            $role->where('name', '!=', 'admin')->where('name', '!=', 'super');
        })->orWhereDoesntHave('roles');
    }
}
