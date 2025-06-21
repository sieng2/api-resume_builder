<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // for auth
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'user_id';
    protected $table = 'user';

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_ban',
    ];

    protected $hidden = [
        'password',
    ];

    // Relationships
    public function resumes()
    {
        return $this->hasMany(Resume::class, 'user_id', 'user_id');
    }

    public function skills()
    {
        return $this->hasMany(Skill::class, 'user_id', 'user_id');
    }

    public function education()
    {
        return $this->hasMany(Education::class, 'user_id', 'user_id');
    }

    public function experience()
    {
        return $this->hasMany(Experience::class, 'user_id', 'user_id');
    }

    public function contactInfo()
    {
        return $this->hasOne(ContactInfo::class, 'user_id', 'user_id');
    }

    // Add more relationships as needed
}
