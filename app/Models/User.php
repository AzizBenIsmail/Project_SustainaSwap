<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function trades()
{
    return $this->hasMany(Trade::class, 'owner'); // Replace 'owner_id' with your actual foreign key column name
}

    //Returns true if the user is a superAdmin
    public function isSuperAdmin()
    {
        return $this->role->roleName == 'superAdmin';
    }
    //Returns true if the user is an admin
    public function isAdmin()
    {
        return $this->role->roleName  ==  'Admin' || $this->role->roleName  ==  'superAdmin';
    }
    //Returns true if its is a user
    public function isUser()
    {
        return $this->role->roleName== 'user';
    }

    //Each user belong to only one unique role
    public function role()
    {
        return  $this->belongsTo(Role::class);
    }

}
