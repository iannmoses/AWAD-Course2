<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function student(): HasOne
    {
        return $this->hasOne(Student::class);
    }

    // courses taught by this user when the role is lecturer
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'lecturer_id');
    }

    // the route name of this user's own dashboard
    public function homeRoute(): string
    {
        return match (true) {
            $this->hasRole('admin') => 'admin.dashboard',
            $this->hasRole('lecturer') => 'lecturer.dashboard',
            default => 'dashboard',
        };
    }

    public function getInitialsAttribute(): string
    {
        return Str::of($this->name)->explode(' ')->filter()->take(2)
            ->map(fn ($word) => Str::upper(Str::substr($word, 0, 1)))->implode('');
    }

    public function getRoleLabelAttribute(): string
    {
        return match ($this->getRoleNames()->first()) {
            'admin' => 'Administrator',
            'lecturer' => 'Lecturer',
            'student' => 'Student',
            default => 'User',
        };
    }
}
