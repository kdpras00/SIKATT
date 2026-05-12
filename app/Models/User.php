<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nik',
        'kk',
        'phone',
        'address',
        'rt_rw',
        'gender',
        'birth_place',
        'birth_date',
        'religion',
        'job',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birth_date' => 'date',
        ];
    }

    // Relationships
    public function letters()
    {
        return $this->hasMany(Letter::class);
    }

    public function processedLetters()
    {
        return $this->hasMany(Letter::class, 'staff_id');
    }

    public function verifiedLetters()
    {
        return $this->hasMany(Letter::class, 'lurah_id');
    }

    // Helper methods
    public function isStaff()
    {
        return $this->hasRole('staff');
    }

    public function isMasyarakat()
    {
        return $this->hasRole('masyarakat');
    }

    public function isLurah()
    {
        return $this->hasRole('lurah');
    }
}
