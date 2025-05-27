<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    const ROLE_ADMIN = 'admin';
    const ROLE_READ_ONLY = 'viewer';
    const ROLE_REGULAR = 'regular';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
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
        ];
    }

    public function owners()
    {
        return $this->hasMany(Owner::class);
    }
    public function isAdmin(): bool{
        return $this->role === self::ROLE_ADMIN;
    }

    public function isReadOnly(): bool{
        return $this->role === self::ROLE_READ_ONLY;
    }

    public function isRegular(): bool{
        return $this->role === self::ROLE_REGULAR;
    }
    public function isViewer(): bool{
        return $this->role === 'viewer';
    }
}
